<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Film;
use App\FilmPersonnel;
use App\User;
use App\Email;
use Validator;
use PDF;
use Zipper;
use Mail;
use App\Mail\SubmitUser;
// use App\Settings as S;
// use Carbon\Carbon;

class FilmController extends Controller
{
    public function index() {
        $user = Auth::user();

        /**
         * Для подмены роли админа на роль другого юзера в сессию пишется значение
         * из конфига roles.admin.role
         * @see App\Http\Middleware\ProfileByRole
         */
        $role = session('role', $user->role);
        $title = 'My Films';
        $films = Film::where('user_id', $user->id)->where('submit', '<>', 2)->orderBy('updated_at', 'desc')->get();

        return view('films.index', compact('user', 'role', 'title', 'films'));
    }

    public function add($step) {
      $user = Auth::user();

      /**
       * Для подмены роли админа на роль другого юзера в сессию пишется значение
       * из конфига roles.admin.role
       * @see App\Http\Middleware\ProfileByRole
       */
      $role = session('role', $user->role);
      $title = 'Film Registration';

      $film = new Film();
      $route = route('f.films.create', $step);
      $attachRoute = route('f.films.attachFirst', $step);
      if (in_array($step, ['producer', 'director',' writer', 'dop']))
          $next = true;
      else
          $next = false;

      $saved = false;

      return view('films.' . $step, compact('user','role','title','film','step','next','route','attachRoute','saved'));
    }

    public function create(Request $request, $step) {
        $user = Auth::user();
        /**
         * Для подмены роли админа на роль другого юзера в сессию пишется значение
         * из конфига roles.admin.role
         * @see App\Http\Middleware\ProfileByRole
         */
        $role = session('role', $user->role);
        $title = 'Film Registration';

        $reqData = $request->except('_token');
        $reqData['user_id'] = $user->id;
        $reqData['submit'] = 0;
        $validator = Validator::make($reqData, Film::getRules($step));
        $reqData['steps'] = serialize(Film::getStepsFirst($step, !$validator->fails()));

        $film = Film::create($reqData);
        foreach (Film::getFiles() as $file) {
            $file_input = $file . '_input';
            if ($request->hasFile($file_input)) {
                $path = 'userfiles/user_' . $user->id . '/film_' . $film->id;
                $ext = $request->$file_input->getClientOriginalExtension();
                $filename = $file . '.' . $ext;
                $film->$file = '/' . $request->$file_input->move($path, $filename);
                $film->save();
            }
        }

        $route = route('f.films.update', ['id' => $film->id, 'step' => $step]);
        $saved = $next = true;

        return view('films.' . $step, compact('user', 'role', 'title', 'film', 'step', 'next', 'route', 'saved'));
    }

    public function edit($id, $step) {
        $user = Auth::user();

        /**
         * Для подмены роли админа на роль другого юзера в сессию пишется значение
         * из конфига roles.admin.role
         * @see App\Http\Middleware\ProfileByRole
         */
        $role = session('role', $user->role);
        $title = 'Film Registration';

        $film = Film::find($id);
        if ( !$film || $film->submit != 0 || $film->user_id != $user->id ) {
          return redirect()->route('f.films');
        }
        $route = route('f.films.update', ['id' => $film->id, 'step' => $step]);
        $attachRoute = route('f.films.attachPerson', ['id' => $film->id, 'step' => $step]);
        if (in_array($step, ['producer', 'director',' writer', 'dop']))
            $next = true;
        else
            $next = false;

        $saved = false;

        return view('films.' . $step, compact('user', 'role', 'title', 'film', 'step', 'next', 'route', 'attachRoute', 'saved'));
    }

    public function update(Request $request, $id, $step) {
        $user = Auth::user();
        /**
         * Для подмены роли админа на роль другого юзера в сессию пишется значение
         * из конфига roles.admin.role
         * @see App\Http\Middleware\ProfileByRole
         */
        $role = session('role', $user->role);
        $title = 'Film Registration';

        $film = Film::findOrFail($id);
        $reqData = $request->except('_token');
        // if (isset($reqData['terms']) || $film->terms)
        //     $reqData['terms'] = 1;

        if ($step == 'detailed' || $step == 'general') {
            // $file_response = [];
            foreach (Film::getFiles() as $file) {
                $file_input = $file . '_input';
                if ($request->hasFile($file_input)) {
                    $path = 'userfiles/user_' . $user->id . '/film_' . $id;
                    $ext = $request->$file_input->getClientOriginalExtension();
                    // $filename = $request->$file_input->getClientOriginalName();
                    $filename = $file . '.' . $ext;
                    $reqData[$file] = '/' . $request->$file_input->move($path, $filename);
                }
            }
        }

        $validator = Validator::make($reqData, Film::getRules($step));

        // $reqData['terms'] = (int)( isset( $reqData['terms'] ) && $reqData['terms'] );
        $film->stepCheck($step, !$validator->fails());
        $film->fill($reqData);
        $film->save();

        $route = route('f.films.update', ['id' => $film->id, 'step' => $step]);
        if (!$film->stepsDone() && $step == 'detailed')
            $next = false;
        else
            $next = true;

        $saved = true;

        return view('films.' . $step, compact('user', 'role', 'title', 'film', 'step', 'next', 'route', 'saved'));
    }

    public function submit(Request $request, $id) {
        $title = 'Film submit';
        $user = Auth::user();

        /**
         * Для подмены роли админа на роль другого юзера в сессию пишется значение
         * из конфига roles.admin.role
         * @see App\Http\Middleware\ProfileByRole
         */
        $role = session('role', $user->role);

        $film = Film::find($id);
        if ($film->user_id == Auth::user()->id && $film->submit == 0) {
            $pdf = PDF::loadHTML(view('films.pdf', compact('user', 'film')));
            $dir = 'userfiles/user_' . $user->id . '/film_' . $film->id . '/';
            if (!File::exists($dir))
                File::makeDirectory($dir, 493, true);

            $filename = $dir . $film->title . '.pdf';
            $pdf->save($filename);

            $zipname = $user->firstname . ' ' . $user->lastname . ' - ' . $film->title . '.zip';
            $files = glob($dir);
            Zipper::make($dir . $zipname)->add($files)->close();

            $emails = Email::pluck('email')->toArray();
            Mail::to($emails)->queue(new \App\Mail\SubmitAdmin($user, $dir, $zipname));

            foreach ($film->personnel() as $person) {
              // отправка письма с подтверждением email
              if ($person->email != $user->email) {
                  $person->confirm_code = uniqid() . uniqid();
                  $person->email_confirmed = 0;
                  Mail::to($person->email)->queue(new \App\Mail\ConfirmRole($user, $film, $person->toArray()));
              } else {
                  // если юзер выбрал себя самого, не нужно подтверждать email
                  $person->email_confirmed = 1;
              }
              $person->save();
            }
            Mail::to($user->email)->queue(new SubmitUser());

            $film->submit = 1;
            $film->save();
            return view('films.congrat', compact('user', 'title', 'role', 'film'));
        } else {
            return redirect()->route('f.films');
        }
    }

    public function preview($id) {
        $user = Auth::user();

        /**
         * Для подмены роли админа на роль другого юзера в сессию пишется значение
         * из конфига roles.admin.role
         * @see App\Http\Middleware\ProfileByRole
         */
        $role = session('role', $user->role);
        $title = 'Film Preview';

        $film = Film::findOrFail($id);

        return view('films.preview-modal', compact('film'));
    }

    public function delete(Request $request, $id) {
        $id = $request->id;
        $film = Film::findOrFail($id);
        $film->submit = 2;
        $film->save();
        // $files = 'userfiles/user_' . $film->user_id . '/film_' . $film->id;
        // if (File::exists($files))
        //     $result = File::deleteDirectory($files);
        // $personnel = FilmPersonnel::where('film_id', $id)->get();
        // if ($film->user_id == Auth::user()->id) {
        //     foreach ($personnel as $P) {
        //        $P->delete();
        //     }
        //     $film->delete();
        // }

        return redirect()->route('f.films');
    }

    public function getPerson(Request $request, $id) {
        $person = FilmPersonnel::find($request->pid);
        $person['is_me'] = $person->is_me;
        return response()->json($person);
    }

    public function attachFirst(Request $request, $step) {
        $user = Auth::user();
        $this->validate($request, FilmPersonnel::getRules($step));

        $reqData = [];
        $reqData['user_id'] = $user->id;
        $reqData['submit'] = 0;
        $reqData['steps'] = serialize(Film::getStepsFirst($step, 1));
        $film = Film::create($reqData);

        return $this->attachPerson($request, $film->id, $step);
    }

    public function attachPerson(Request $request, $id, $step) {
        $user = Auth::user();
        $film = Film::find($id);

        $this->validate($request, FilmPersonnel::getRules($step));

        $reqData = $request->except('_token');
        $reqData['film_id'] = $id;
        $reqData['role'] = $step;

        // // отправка письма с подтверждением email
        // if ($reqData['email'] != $user->email) {
        //     $reqData['confirm_code'] = uniqid() . uniqid();
        //     $reqData['email_confirmed'] = 0;
        //     Mail::to($reqData['email'])->send(new \App\Mail\ConfirmRole($user, $film, $reqData));
        // } else {
        //     // если юзер выбрал себя самого, не нужно подтверждать email
        //     $reqData['email_confirmed'] = 1;
        // }

        $person = FilmPersonnel::create($reqData);


        $film->stepCheck($step);
        $film->save();

        return redirect()->route('f.films.edit', ['id' => $id, 'step' => $step]);
    }

    public function editPerson(Request $request, $id, $step) {
        $user = Auth::user();
        $film = Film::find($id);

        $this->validate($request, FilmPersonnel::getRules($step));

        $person = FilmPersonnel::find($request->pid);

        $reqData = $request->except('_token', 'pid');

        // // отправка письма с подтверждением email
        // if ($reqData['email'] != $user->email && $reqData['email'] != $person->email) {
        //     $reqData['confirm_code'] = uniqid() . uniqid();
        //     $reqData['email_confirmed'] = 0;
        //     Mail::to($reqData['email'])->send(new \App\Mail\ConfirmRole($user, $film, $reqData));
        // }

        $person->fill($reqData);
        $person->save();

        return redirect()->route('f.films.edit', ['id' => $id, 'step' => $step]);
    }

    public function dettachPerson(Request $request, $id, $step) {
        $person = FilmPersonnel::find($request->pid);
        $film = Film::find($id);

        if (count($film->personnel($step)) == 1) {
            $film->stepCheck($step, 0);
            $film->save();
        }

        $person->delete();

        return redirect()->route('f.films.edit', ['id' => $id, 'step' => $step]);
    }
    // public function sendMail() {
    //   // $rawCycle = S::where('name','period_end')->first()->value;
    //   // $cycle = Carbon::parse($rawCycle)->toDayDateTimeString();
    //   // $until = Carbon::parse($rawCycle)->addDays(5)->toDayDateTimeString();
    //   // dd($until);
    //   $user = Auth::user();
    //   Mail::to($user)->send(new SubmitUser());
    // }
}

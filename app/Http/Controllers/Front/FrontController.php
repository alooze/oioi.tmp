<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Form;
use App\FormUse;
use App\Email;
use Mail;
use App\Mail\FormInfoForManager;
use App\Mail\BugForm;
use App\Mail\PresentationForUser;
use Validator;
use App\FaqQuestion;
use App\Settings as S;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\FilmPersonnel;

class FrontController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        // setcookie('qid', '', -1);
        $faq = FaqQuestion::where('status', 1)->get();
        return view('index', compact('faq', 'user'));
    }

    public function confirmRole(Request $request, $code)
    {
        $fp = FilmPersonnel::where('confirm_code', $code)
                            ->where('email', $request->from)
                            ->firstOrFail();
        $fp->confirm_code = NULL;
        $fp->email_confirmed = 1;
        $fp->save();
        $emails = Email::pluck('email');
        Mail::to($emails)->queue(new \App\Mail\ConfirmRoleAdmin($fp));

        // уточнить, куда направлять после подтверждения
        return view('confirm');
        // return "Confirmation success. Thanks!";
    }

    public function contact(Request $request)
    {
        $this->validate($request, [
            'who-you-are' => 'required',
            'name' => 'required',
            'email' => 'required',
            'message' => 'required',
        ]);
        return $this->touchForm($request);
    }

    private function touchForm($requestDataObj)
    {
        $data = $requestDataObj->except('_token','form_id','who-you-are');
        $data['who'] = $requestDataObj->input('who-you-are');
        $fs['json'] = json_encode($data);
        $fs['form_id'] = $requestDataObj->form_id;
        $formUseObj = FormUse::create($fs);

        $form = Form::find($requestDataObj->form_id);
        if ($form) {
            $emails = $form->emails();
            if ($emails && isset($emails[0])) {
                foreach ($emails as $i => $email) {
                    $mail = Mail::to($email)->send(new FormInfoForManager($formUseObj, $form));
                }
                // $mail = Mail::to($emails[0]);

                // foreach ($emails as $i => $email) {
                //     // if ($i == 0) continue;
                //     $mail->to($email);
                // }

                // $mail->send(new FormInfoForManager($formUseObj, $form));
            }
        }
        return Redirect('/');
    }

    public function bug(Request $request)
    {
        $this->validate($request, [
          'who' => 'required',
          'name' => 'required',
          'email' => 'required',
          'message' => 'required',
        ]);
        return $this->touchBug($request);
    }

    private function touchBug($requestDataObj) {
      $data = $requestDataObj->except('_token','form_id');
      $fs['json'] = json_encode($data);
      $fs['form_id'] = $requestDataObj->form_id;
      $formUseObj = FormUse::create($fs);

      $form = Form::find($requestDataObj->form_id);
      if ($form) {
          $emails = $form->emails();
          if ($emails) {
              foreach ($emails as $i => $email) {
                    $mail = Mail::to($email)->send(new BugForm($formUseObj, $form));
                }
                // $mail = Mail::to($emails[0]);

              // foreach ($emails as $i => $email) {
              //     // if ($i == 0) continue;
              //     $mail->to($email);
              // }

              // $mail->send(new BugForm($formUseObj, $form));
          }
      }
      return response()->json('200');
    }
}

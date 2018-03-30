<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\City;
use App\Country;

use Validator;

class ProfileController extends Controller
{
    public $countries;

    public function index()
    {
        $user = Auth::user();

        /**
         * Для подмены роли админа на роль другого юзера в сессию пишется значение
         * из конфига roles.admin.role
         * @see App\Http\Middleware\ProfileByRole
         */
        $role = session('role', $user->role);
        $active = request()->route()->getName();
        $title = 'My Profile';

        $saved = false;
        return view('profile.' . $role, compact('user','role','active','title', 'saved'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        /**
         * Для подмены роли админа на роль другого юзера в сессию пишется значение
         * из конфига roles.admin.role
         * @see App\Http\Middleware\ProfileByRole
         */

        $role = session('role', $user->role);
        $model = "App\\" . ucfirst($role);
        $roledUser = new $model();
        $this->validate($request, $roledUser->getProfileRules($request->block, $user->id));

        switch ($request->block) {
            case 'general' :
                $reqData = $request->except('_token');
                $file_input = 'image_input';
                if ($request->hasFile($file_input)) {
                    if (File::exists($user->image)) {
                        File::delete($user->image);
                    }
                    $path = 'userfiles/user_' . $user->id;
                    $ext = $request->$file_input->clientExtension();
                    $filename = $request->$file_input->getClientOriginalName();
                    $reqData['image'] = $request->$file_input->move($path, $filename);
                // } elseif (isset($reqData['image'])) {
                //     $reqData['image'] = '';
                //     if (File::exists($user->image)) {
                //         File::delete($user->image);
                //     }
                }
                $user->fill($reqData);
                $user->save();
                break;
            case 'contact' :
                $reqData = $request->except('_token');
                $user->fill($reqData);
                $user->save();
                break;
            case 'password':
                $data = ['email' => $user->email, 'password' => $request->password];
                // dd($data);
                $response = Auth::validate($data);
                if ($response) {
                    $user->password = bcrypt($request->passnew);
                    $user->save();
                    return response('Saved', 200);
                } else {
                  return response(['password'=>["Current password invalid"]], 422);
                }
                break;
        }
    }
}

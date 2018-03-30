<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Producer;
use App\Funder;
use App\Distributor;
use App\Manager;

class UserController extends Controller
{
    public function index($role)
    {
        $role = str_singular($role);
        $users = User::where(['role' => $role])->get();
        return view('admin.users.index', compact('users','role'));
    }
    // public function roleIndex($role)
    // {
    //     $role = str_singular($role);
    //     $users = User::where(['role' => $role])->get();
    //     return view('admin.users.' . $role, compact('users'));
    // }

    public function add($role = null)
    {
        if (!$role) {
            $role = 'manager';
        }
        $userClass = '\\App\\' . ucfirst($role);
        $user = new $userClass;
        $user->usertype = $role;
        $action = route('a.user.create');
        $title = 'Create ' . $role . ' user';
        return view('admin.users.form', compact('user','role','action','title'));
    }

    public function edit($role, $id)
    {
        if (!$role) {
            $role = 'manager';
        }
        $userClass = '\\App\\' . ucfirst($role);
        $user = $userClass::findOrFail($id);
        $role = $user->role;
        $action = route('a.user.update', ['id' => $user->id]);
        $title = 'Edit ' . $role . ' user';
        return view('admin.users.form', compact('user','role','action','title'));
    }

    public function create(Request $request)
    {
        $userClass = '\\App\\' . ucfirst($request->role);
        $user = new $userClass;

        if ($user->adminValidateRules) {
            $this->validate($request, $user->adminValidateRules);
        } else {
            $this->validate($request, [
                'email' => 'required|email|unique:users,email',
            ]);
        }
        
        if (!$request->password) {
            $password = 'adminadmin';
        } else {
            $password = $request->password;
        }

        $data = $request->except('_token');
        $user = $userClass::create($data);
        
        $user->password = bcrypt($password);
        $user->save();

        return redirect()->route('a.user.edit', ['id' => $user->id]);
    }

    public function update(Request $request, $id)
    {
        $userClass = '\\App\\' . ucfirst($request->role);
        $user = $userClass::findOrFail($id);

        if ($user->adminValidateRules) {
            $this->validate($request, $user->adminValidateRules);
        } else {
            $this->validate($request, [
                'email' => 'required|email|unique:users,email,' . $user->id,
            ]);
        }

        $data = $request->except('_token', 'password');
        foreach ($data as $key => $value) {
            $user->$key = $value;
        }

        if(!empty($request->password)) {
            $user->password = bcrypt($request->password);
        }
        $user->save();

        return redirect()->route('a.user.edit', ['id' => $user->id]);
    }

    public function delete($id)
    {
        $user = User::where('id', $id)->first();
        if (!$user) {
            abort(404);
        }
        $model = 'App\\' . ucfirst($user->role);
        $user->delete();
        $role_user = $model::where('user_id', $id)->first();
        $role_user->delete();
        return redirect()->route('a.users');
    }

    /**
     * Пока не используется
     */
    // public function massEdit(Request $request)
    // {
    //     $result;
    //     switch ($request->action) {
    //         case 'mass_delete':
    //             $result = User::whereIn('id',$request->ids)->delete();
    //             break;
    //         case 'mass_publish':
    //             $result = User::whereIn('id',$request->ids)->update(['publish_status'=>Pages::STATUS_PUBLISHED]);
    //             break;
    //         case 'mass_hide':
    //             $result = User::whereIn('id',$request->ids)->update(['publish_status'=>Pages::STATUS_ARCHIVE]);
    //             break;
    //     }
    //     return $result;
    // }
}

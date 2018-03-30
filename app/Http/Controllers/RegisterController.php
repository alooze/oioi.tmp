<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

use App\User;

class RegisterController extends Controller
{
    public function index()
    {
        return view("register.index");
    }

// Loads the first-step view for each role of user
    public function load_first_step(Request $request) {
        $role = $request->role;
        return view("register.{$role}-first")->withInput($request);
    }

// Validates the first-step inputs for each role of user
    public function first_step_check(Request $request)
    {
    // get model class
        $role = $request->role;
        $model = "App\\" . ucfirst($role);

    // get the rules from model
        $rules = (new $model())->get_rules('register');

    // validate rules
        $validator = Validator::make($request->all(), $rules['first-step']);
        if ($validator->fails()) {

    // return first step with errors
            return view("register.{$role}-first")->withErrors($validator)->withInput($request);
        } else {

    // go to second step
            return view("register.{$role}-second")->withInput($request);
        }
    }

// Validates the first and second step inputs for each role of user
// Submits the registration for each role of user
    public function second_step_check(Request $request)
    {
    // get model class
        $role = $request->role;
        $model = "App\\" . ucfirst($role);

    // object of user role
        $Role_user = new $model();

    // get rules from model
        $rules = $Role_user->get_rules('register');

    // validate first step
        $first_validator = Validator::make($request->all(), $rules['first-step']);

    // validate second step
        $second_validator = Validator::make($request->all(), $rules['second-step']);
        if ($first_validator->fails()) {

    // return first-step with errors
            return view("register.{$role}-first")->withErrors($first_validator)->withInput($request);
        } elseif ($second_validator->fails()) {

    // return second-step with errors
            return view("register.{$role}-second")->withErrors($second_validator)->withInput($request);
        } else {

    // create row into users table
            $User = new User();
            $User->name = explode('@', $request->email)[0];
            $User->email = $request->email;
            $User->password = bcrypt($request->pass);
            $User->role = $request->role;
            $User->save();

    // create row into role user table
            $special_data = [];
            foreach ($Role_user->get_fields() as $key => $field) {
                $special_data[$field] = (string)$request->$field;
            }
            $special_data['user_id'] = $User->id;
            $Role_user->create($special_data);

            return 'true';
        }

    }
}

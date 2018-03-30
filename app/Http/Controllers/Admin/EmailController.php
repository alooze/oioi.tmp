<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Email;

class EmailController extends Controller
{
    public function index()
    {
        $emails = Email::get();
        $email = new Email();
        $action = route('a.email.create');
        return view('admin.emails.index', compact('emails', 'email', 'action'));
    }

    public function create(Request $request)
    {
        $this->validate($request, 
            [
                'email'=>'email|required|unique:emails,email',
            ] 
        );

        $r = $request->except('_token');
        $email = Email::create($r);  
        
        return redirect()->route('a.emails');     
    }

    public function edit(Request $request, $id)
    {
        $email = Email::findOrFail($id);
        
        $action = route('a.email.update', ['id' => $email->id]);
        $emails = false;
        return view('admin.emails.index', compact('emails', 'email', 'action'));
    }

    public function update(Request $request, $id)
    {
        $email = Email::findOrFail($id);
        $this->validate($request, 
            [
                'email'=>'email|required|unique:emails,email,' . $email->id,
            ] 
        );

        $email->name = $request->name;  
        $email->email = $request->email; 
        $email->save(); 
        
        return redirect()->route('a.emails');     
    }

    public function delete($id)
    {
        $email = Email::find($id);
        if ($email != null) {
            $email->delete();
        } 
        return redirect()->route('a.emails');
    }
}
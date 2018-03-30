<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Email;
use App\Form;
use App\FormUse;

class FormController extends Controller
{
    public function index()
    {
        $forms = Form::with(['uses'])->get();
        $emails = Email::get();
        return view('admin.forms.index', compact('forms'/*, 'form'*/, 'emails'));
    }

    public function add()
    {
        $form = new Form();
        return view('admin.forms.create', compact('form'));
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'from' => 'required|email',
        ]);
        $reqData = $request->except('_token');
        $form = Form::create($reqData);
        return redirect()->route('a.form.edit', ['id' => $form->id]);        
    }

    public function edit($id)
    {
        $form = Form::find($id);
        if (!$form) {
            abort(404);
        }
        return view('admin.forms.update', compact('form'));
    }

    public function update(Request $request, $id)
    {
        $reqData = $request->except('_token');
        $form = Form::where('id', $id )->first();
        if($form != null){
            $form->name = $reqData['name'];
            $form->from = $reqData['from'];
            $form->save();
        }
        return redirect()->route('a.form.update', ['id' => $id]);
    }

    public function delete(Request $request, $id)
    {
        $form = Form::find($id);
        if ($form) {
            $form->delete();
        }
        return redirect()->route('a.forms');
    }

    public function saveMails(Request $request, $id)
    {
        $form = Form::findOrFail($id);

        if ($request->emails) {
            $form->email_ids = implode(',', $request->emails);
        } else {
            $form->email_ids = null;
        }
        $form->save();

        return redirect()->route('a.forms');
    }

    public function log($id)
    {
        $form = Form::with(['uses'])->findOrFail($id);
        return view('admin.forms.log', compact('form'));
    }

    public function export($id)
    {
        $form = Form::with(['uses'])->findOrFail($id);
        die('reserved');
    }

}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Email;
use App\Form;
use App\FormUse;
use Excel;

class RelationsController extends Controller
{
    public $form;
    public $slugs;
    public $backSlugs;
    public $statuses;

    public function __construct(Request $request)
    {
    $this->slugs = [ 1 => 'contact', 2 => 'bug', /*2 => 'finform', 3 => 'consultform',*/ ];
        $this->backSlugs = array_flip($this->slugs);
        $this->statuses = [ 0 => 'New', 1 => 'Viewed', /*2 => 'Deleted',*/ ];
        $slug = isset($request->route()->parameters['slug']) ? $request->route()->parameters['slug'] : '';

        if (!in_array($slug, $this->slugs)) {
            $this->form = false;
        } else {
            $this->form = Form::find($this->backSlugs[$slug]);
        }
    }

    public function index(Request $request, $slug='')
    {
        if (!$this->form) {
            return redirect(route('ar.relations', ['slug' => 'contact']));
        }

        $uses = FormUse::where('form_id', $this->form->id)
                        ->where('status', '<', '2')
                        ->get();
        $formUses = [];

        foreach($uses as $formUse) {
            $formUse->data = json_decode($formUse->json, true);
            $formUses[] = $formUse;
        }

        return view('admin.relations.index', [
                        'form' => $this->form,
                        'formUses' => $formUses,
                        'slug' => $slug,
                        'statuses' => $this->statuses,
                    ]);
    }

    public function fullindex(Request $request, $slug='')
    {
        if (!$this->form) {
            return redirect(route('ar.relations', ['slug' => 'callbackform']));
        }

        $uses = FormUse::where('form_id', $this->form->id)->get();
        $formUses = [];

        foreach($uses as $formUse) {
            $formUse->data = json_decode($formUse->json, true);
            $formUses[] = $formUse;
        }

        return view('admin.relations.index', [
                        'form' => $this->form,
                        'formUses' => $formUses,
                        'slug' => $slug,
                        'statuses' => $this->statuses,
                    ]);
    }

    public function add($slug)
    {
        $fUse =  new FormUse();
        return view('admin.relations.form', [
                        'form' => $this->form,
                        'formUse' => $fUse,
                        'slug' => $slug,
                        'statuses' => $this->statuses,
                        'title' => 'Add form data'
                    ]);
    }

    public function edit($slug, $id)
    {
        $fUse = FormUse::findOrFail($id);
        foreach (json_decode($fUse->json, true) as $key => $value) {
            $fUse->$key = $value;
        }
        return view('admin.relations.form', [
                        'form' => $this->form,
                        'formUse' => $fUse,
                        'slug' => $slug,
                        'statuses' => $this->statuses,
                        'title' => 'Edit form data'
                    ]);
    }

    public function create(Request $request, $slug)
    {
        if ($this->form->id == 2) {
            $this->validate($request, [
                'email' => 'email|required',
                'name' => 'required',
                // 'phone' => 'required',
            ]);
        } else {
            $this->validate($request, [
                'name' => 'required',
                // 'phone' => 'required',
            ]);
        }

        $fs['form_id'] = $this->form->id;
        $fs['status'] = $request->status;
        $fs['json'] = json_encode($request->except('_token','status'));
        $fUse = FormUse::create($fs);

        return redirect(route('ar.relations.edit', ['slug' => $slug, 'id' => $fUse->id]));
    }

    public function update(Request $request, $slug, $id)
    {
        $fUse = FormUse::findOrFail($id);

        if ($this->form->id == 2) {
            $this->validate($request, [
                'email' => 'email|required',
                'name' => 'required',
                // 'phone' => 'required',
            ]);
        } else {
            $this->validate($request, [
                'name' => 'required',
                // 'phone' => 'required',
            ]);
        }

        $fUse->status = $request->status;
        $fUse->json = json_encode($request->except('_token','status'));
        $fUse->save();

        return redirect(route('ar.relations.edit', ['slug' => $slug, 'id' => $fUse->id]));
    }

    public function delete($id)
    {
        $fu = FormUse::find($id);
        if ($fu) {
            // $fu->status = 2;
            // $fu->save();
            $fu->delete();
        }
        return redirect()->back();
    }

    public function export($slug)
    {
        if (request()->route()->getName() == 'ar.relations.exportall') {
            $fUses = FormUse::where('form_id', $this->form->id)
                            ->get();
        } else {
            $fUses = FormUse::where('form_id', $this->form->id)
                            ->where('status', '<', '2')
                            ->get();
        }

        $exportData = [];
        foreach ($fUses as $fUse) {
            $tmpAr = json_decode($fUse->json, true);
            $tmpAr['date'] = $fUse->created_at->format('d.m.Y H:i');
            $tmpAr['status'] = $this->statuses[$fUse->status];
            $exportData[] = $tmpAr;
            unset($tmpAr);
        }

        Excel::create('Report_' . date('d.m.Y.H.i'), function($excel) use ($exportData) {
            $excel->sheet('Form data', function($sheet) use ($exportData) {
                $sheet->fromArray($exportData, null, 'A1', true);
            });
        })->download('xlsx');
    }

}

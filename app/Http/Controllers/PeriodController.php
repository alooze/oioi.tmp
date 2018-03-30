<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Settings as S;

class PeriodController extends Controller
{
    public function add()
    {
        $action = route('a.periods.save');
        $period = S::where('name','period_end')->first();
        if (!$period) {
            $period = new S;
        }
        $email = S::where('name','email_days')->first();
        if (!$email) {
            $email = new S;
        }
        return view('admin.periods.form', compact('action','period','email'));
    }

    public function save(Request $request)
    {
        $period = S::where('name','period_end')->first();
        if (!$period) {
            $period = new S;
            $period->name = 'period_end';
        }
        $period->value = $request->period_end;
        $period->save();

        $email = S::where('name','email_days')->first();
        if (!$email) {
            $email = new S;
            $email->name = 'email_days';
        }
        $email->value = $request->email_days;
        $email->save();
        
        return redirect()->back();
    }
}

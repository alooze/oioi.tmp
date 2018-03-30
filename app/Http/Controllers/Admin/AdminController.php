<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Film;

class AdminController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.index');
    }

    public function films()
    {
        $films = Film::orderBy('created_at', 'desc')->get();
        return view('admin.films.stub', compact('films'));
    }
}

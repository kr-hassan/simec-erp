<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home.index');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function form()
    {
        $title = "New Form";
        return view('pagelink.forms', compact('title'));
    }

    public function anotherForm()
    {
        $title = "New anotherForm";
        return view('pagelink.anotherForm', compact('title'));
    }
}

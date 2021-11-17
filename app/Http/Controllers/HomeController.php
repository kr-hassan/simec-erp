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

    public function form($id)
    {
        if ($id == 1) {
            $title = "New Form";
            $button_id = 1;
        }

        if ($id == 2) {
            $title = "New anotherForm";
            $button_id = 2;
        }

        return view('pagelink.forms', compact('title', 'button_id'));
    }


}

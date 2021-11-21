<?php

namespace App\Http\Controllers;

use App\Models\MenuManager;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $menus = MenuManager::with('childs')->whereNull('parent_id')->whereStatus(1)->get();

//        $all_menus =MenuManager::where('parent_id', 0)->with('')->get();
        return view('home.index', compact('menus'));
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

    public function create(Request $request)
    {
        return view('pagelink.forms', compact('title', 'button_id'));
    }

    public function edit($btnid)
    {
        return view('pagelink.forms', compact('title', 'button_id'));
    }

    public function update(Request $request)
    {
        return view('pagelink.forms', compact('title', 'button_id'));
    }

    public function delete(Request $request)
    {
        return view('pagelink.forms', compact('title', 'button_id'));
    }

}

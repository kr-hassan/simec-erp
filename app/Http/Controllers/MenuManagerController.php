<?php

namespace App\Http\Controllers;

use App\Models\MenuManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use function GuzzleHttp\Promise\all;

class MenuManagerController extends Controller
{
    public function index()
    {
        $menus = MenuManager::with('childs')->whereStatus(1)->get();
        return view('pagelink.setting.menu.index', compact('menus'));

    }
    public function create()
    {
        $menus = MenuManager::whereStatus(1)->get();
        return view('pagelink.setting.menu.create', compact('menus'));

    }

    public function insert(Request $request)
    {

        $this->validate($request, [
            'title' => 'required|min:3|max:255',
            'type' => 'required',
            'status' => 'required',
        ]);

        $data = [
            'index' => $request->index,
            'title' => $request->title,
            'parent_id' => $request->parent_id,
            'url' => $request->url,
            'type' => $request->type,
            'status' => $request->status,
            'creator_id' => Auth::user()->id,
        ];

        MenuManager::create($data);
        Session::flash('success', "Created successfully");
        return Redirect::back();
    }

    public function list()
    {
        $menus = MenuManager::whereStatus(1)->get();
        return view('pagelink.setting.menu.index', compact('menus'));

    }

}

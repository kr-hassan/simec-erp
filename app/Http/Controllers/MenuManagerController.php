<?php

namespace App\Http\Controllers;

use App\Models\MenuManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class MenuManagerController extends Controller
{
    public $menuManager = null;

    public function __construct()
    {
        $this->menuManager = new MenuManager();
    }

    public function index()
    {
        $menus = $this->menuManager->allData();
        return view('setting.menu.index', compact('menus'));
    }

    public function create()
    {
        $menus = $this->menuManager->allData();
        return view('setting.menu.create', compact('menus'));
    }

    /*    public function edit(Request $request)
        {
            $id = (int)$request->id;
            $menus = $this->menu->all_menu();
            $menu = $this->menu->find_data($id);
            return view('setting.menu.edit', compact('menu', 'menus'));

        }*/

    public function insert(Request $request)
    {
        try {
            $this->validate($request, [
                'title' => 'required|min:3|max:255',
                'status' => 'required',
            ]);
            $data = [
                'index' => $request->index,
                'title' => $request->title,
                'parent_id' => $request->parent_id,
                'url' => $request->url,
                'status' => $request->status,
                'creator_id' => Auth::user()->id,
            ];

            $menuManage = $this->menuManager->create_menu($data);
            Session::flash('success', "Created successfully");
            return Redirect::back();

        } catch (\Throwable $th) {
            return redirect()->back()->with(['error' => 'Some Validation Error Occurred!']);

        }


    }

    public function edit($id)
    {
        $menus = $this->menuManager->allData();
        $single_menu = $this->menuManager->find($id);

        return view('setting.menu.edit', compact('single_menu', 'menus'));

    }

    public function update(Request $request, $id)
    {
        try{
            $this->validate($request, [
                'title' => 'required|min:3|max:255',
                'status' => 'required',
            ]);

            $data = [
                'index' => $request->index,
                'title' => $request->title,
                'parent_id' => $request->parent_id,
                'url' => $request->url,
                'status' => $request->status,
                'creator_id' => Auth::user()->id,
            ];
            $updateMenu = $this->menuManager->menuUpdate($id, $data);
            Session::flash('success', "Updated successfully");
            return redirect()->route('viewMenuManager');

        }
        catch (\Throwable $th){
            return redirect()->back()->with(['error' => 'Some Validation Error Occurred!']);
        }

    }


}

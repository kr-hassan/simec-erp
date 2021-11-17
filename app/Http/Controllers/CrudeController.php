<?php

namespace App\Http\Controllers;

use App\Models\MenuManager;
use Illuminate\Http\Request;

class CrudeController extends Controller
{
    public function view()
    {
        return view('pagelink.menumanager');

    }

    public function insert(Request $request)
    {

        $this->validate($request, [
            'title' => 'required',
        ]);

        $data = [
            'index' => $request->index,
            'title' => $request->title,
            'parent_id' => $request->parent_id,
            'url' => $request->url,
            'type' => $request->type,
            'status' => $request->status,
        ];

        MenuManager::insert($data);
        return redirect()->back()
            ->with('success', 'Created successfully');


    }
}

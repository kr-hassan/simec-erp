<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MenuManager extends Model
{

    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function childs()
    {
        return $this->hasMany(MenuManager::class, 'parent_id');
    }

//    public function findMenu($id)
//    {
//        return $this->findOrfail($id);
//    }


 /*   public function allParentMenu()
    {
        return $this->whereNull('parent_id')->with('childs')->where(function ($q) {
            $q->where('status', 1);
        })->where('status', 1)->get();
    }*/

    public function allData()
    {
        $data = $this->where('status', 1)->with('childs', function($query){
            $query->where('status', 1);
        })->get();
        return $data;
    }

    public function allParentMenu()
    {
        return $this->whereNull('parent_id')->with('childs', function($query){
            $query->where('status', 1);
        })->where('status', 1)->get();
    }

    /*    public function scopeActive($query)
        {
            return $query->where('status', 1);
        }*/


    public function scopeFind($query, $id)
    {
        return $query->where('id', $id)->first();
    }

    public function menuUpdate($id, $data)
    {
        $menu = $this->Find($id);
        return $menu->update($data);

    }

    public function create_menu($data)
    {
        $menuCreate = MenuManager::create($data);
        return $menuCreate;

    }


}

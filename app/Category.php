<?php

namespace App;

// use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;


class Category extends Model
{
    protected $fillable = ['name', 'description'];

    public static function getAll() {
    	return Category::paginate(12);
    }

    public static function getCategoryById($id) {
    	return Category::where('id',$id)->first();
    }

    public static function remove($id) {
    	return Category::where('id',$id)->delete();
    }

    public static function edit($request, $id) {
    	return Category::where('id', $id)
    				->update(['name' => $request->name, 'description' => $request->description]);
    }
}

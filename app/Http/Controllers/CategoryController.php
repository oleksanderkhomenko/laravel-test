<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function viewAll() {
    	$categories = Category::getAll();
    	return view('category/all',['categories' => $categories]);
    }

    public function new() {
    	return view('category/new');
    }

    public function save(Request $request) {
    	if (isset($request->name) && !empty($request->name) && isset($request->description) && !empty($request->description)) {
	    	Category::create([
	            'name' => $request->name,
	            'description' => $request->description,
	        ]);
    	}
        return redirect('categories');
    }

    public function delete(Request $request, $id) {
        if ($request->isMethod('post')){
    		if(isset($id) && is_numeric($id)) {
		    	Product::removeByCategoryId($id);
		    	Category::remove($id);
	            return response()->json(['status' => 'success']);
    		}
        }
        return response()->json(['status' => 'failure']);
    }

    public function edit($id) {
    	if (isset($id) && is_numeric($id)) {
	    	$category = Category::getCategoryById($id);
	    	return view('category/edit', ['category' => $category]);
    	}
    }

    public function update(Request $request, $id) {
    	if (isset($request->name) && !empty($request->name) && isset($request->description) && !empty($request->description) && isset($id) && is_numeric($id)) {
    		Category::edit($request, $id);
	    }
    	return redirect('categories');
    }
}

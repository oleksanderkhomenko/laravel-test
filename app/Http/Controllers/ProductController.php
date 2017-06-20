<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
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

    public function categoryProducts($id) {
    	$category = Category::getCategoryById($id);
    	$products = Product::getCategoryProducts($id);
    	return view('product/category_products',['products' => $products, 'category' => $category]);
    }

    public function new($id) {
    	return view('product/new',['category_id' => $id]);
    }

    public function save(Request $request, $id) {
    	if (isset($request->name) && !empty($request->name) && isset($request->description) && !empty($request->description) && isset($request->price) && !empty($request->price) && is_numeric($request->price) && isset($id) && !empty($id) && is_numeric($id) && isset($request->image) && !empty($request->image)) {
	    	$additional = [];
	    	if (isset($request->additional_name)) {
		    	foreach ($request->additional_name as $key => $value) {
		    		if(!empty($value) && !empty($request->additional_description[$key])){
			    		$additional[$value] = $request->additional_description[$key];
		    		}
		    	}
	    	}
	    	Product::create([
	            'name' => $request->name,
	            'description' => $request->description,
	            'price' => $request->price,
	            'category_id' => $id,
	            'image' => $request->image,
	            'additional_properties' => json_encode($additional),
	        ]);
	        return redirect('products/'.$id);
    	} else {
    		return redirect('/categories/');
    	}
    }

    public function edit($id) {
    	$product = Product::getProductById($id);
    	$additional = json_decode($product->additional_properties, true);
    	return view('product/edit', ['product' => $product, 'additional'=>$additional]);
    }

    public function update(Request $request, $id) {
    	if (isset($request->name) && !empty($request->name) && isset($request->description) && !empty($request->description) && isset($request->price) && !empty($request->price) && is_numeric($request->price) && isset($id) && !empty($id) && is_numeric($id) && isset($request->image) && !empty($request->image)) {
	    	$additional = [];
	    	if (isset($request->additional_name)) {
		    	foreach ($request->additional_name as $key => $value) {
		    		if (!empty($value) && !empty($request->additional_description[$key])){
			    		$additional[$value] = $request->additional_description[$key];
		    		}
		    	}
	    	}
	    	Product::edit($request, $id,$additional);
	    	$product = Product::getProductById($id);
	    	return redirect('/products/'.$product->category_id);
    	} else {
    		return redirect('/categories/');
    	}
    }

    public function delete(Request $request, $id) {
    	if ($request->isMethod('post')){
    		if(isset($id) && is_numeric($id)) {
		    	Product::remove($id);
	            return response()->json(['status' => 'success']);

    		}
        }
        return response()->json(['status' => 'failure']);
    }
}

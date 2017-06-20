<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\View;
use Illuminate\Http\Request;

class GuestViewController extends Controller
{
    public function viewAll() {
    	$categories = Category::getAll();
    	$products = Product::getPopular();
    	return view('main/categories',['categories' => $categories, 'products' => $products]);
    }

    public function viewCategory($id) {
    	$category = Category::getCategoryById($id);
    	$products = Product::getCategoryProducts($id);
    	return view('main/category', ['category' => $category, 'products' => $products]);
    }

    public function viewProduct($id) {
    	$product = Product::getProductById($id);
    	$category = Category::getCategoryById($product->category_id);
    	$additional = json_decode($product->additional_properties, true);
    	$same_category_products = Product::getSameCategoryProducts($category->id,$product->id);
    	View::create(['product_id' => $id]);

    	return view('main/product', ['category' => $category, 'product' => $product, 'additional' => $additional, 'same' => $same_category_products]);
    }

    public function searchProducts(Request $request) {
    	$search = $request->search;
    	$products = Product::getProductsBySearch($search);
    	return view('main/search', ['products' => $products]);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    protected $fillable = ['name', 'description', 'image', 'category_id', 'additional_properties', 'price'];

    public static function getCategoryProducts($id) {
    	return Product::where('category_id', $id)->paginate(12);
    }

    public static function getProductById($id) {
    	return Product::where('id',$id)->first();
    }

    public static function edit($request, $id, $additional) {
    	return Product::where('id', $id)
    				->update(['name' => $request->name,
            				'description' => $request->description,
            				'price' => $request->price,
            				'image' => $request->image,
            				'additional_properties' => json_encode($additional)]);
    }

    public static function remove($id) {
    	return Product::where('id',$id)->delete();
    }

    public static function removeByCategoryId($id) {
    	return Product::where('category_id',$id)->delete();
    }

    public static function getProductsBySearch($search) {
        return Product::where('name', 'like' , '%' . $search . '%')
                ->orWhere('description', 'like', '%' . $search . '%')
                ->orWhere('name', 'like', '%' . $search . '%')
                ->orWhere('price', 'like', '%' . $search . '%')->get();
    }

    public static function getPopular() {
        return Product::leftJoin('views', 'views.product_id', '=', 'products.id')
                        ->groupBy('products.id')
                        ->limit(5)
                        ->orderBy('views', 'desc')
                        ->get(['products.id', 'products.name', 'products.description', DB::raw('count(views.product_id) as views')]);
    }

    public static function getSameCategoryProducts($category_id,$product_id) {
        return Product::where([['category_id', $category_id],['id', '<>', $product_id]])
                ->limit(4)
                ->get();
    }
}

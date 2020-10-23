<?php

namespace App\Http\Controllers\Api;

use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{

    public function index()
    {
        $categories = Category::orderBy('id', 'ASC')
            ->select('id as cid', 'name', 'image_url', 'description')
            ->get();
        return response()->json($categories, 200);
    }

    public function show($id)
    {
        $products = Product::where('category_id', '=', $id)
            ->Where('available', true)
            ->with('likesCount')
            ->with('isLiked')
            ->with(array('category' =>function($query){
                $query->select('id', 'name');
            }))
            ->select('id', 'name', 'image_url', 'description', 'price', 'category_id', 'offer', 'offer_price')
            ->get();

        return response()->json($products,200);
    }
}

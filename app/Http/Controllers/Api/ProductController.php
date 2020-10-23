<?php

namespace App\Http\Controllers\Api;

use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('id', 'DESC')
            ->select('id as pid', 'name', 'image_url', 'description',
                'price', 'offer','offer_price', 'category_id')
            ->where('available', true)
            ->with(array('category' =>function($query){
                $query->select('id', 'name');
            }))->paginate(20);
        $categories = Category::all(['id', 'name'])->pluck('name', 'id');
        $total = Product::where('available', true)->count();

        return response()->json([
            'total' => $total,
            'categories' => $categories,
            'products' => $products
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::where('id' ,'=', $id)
            ->select('id', 'name', 'image_url', 'description', 'price')
            ->first();
        return response()->json($product, 200);
    }
}

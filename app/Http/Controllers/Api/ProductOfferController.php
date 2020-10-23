<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class ProductOfferController extends Controller
{

    public function index()
    {
        $products = Product::orderBy('id', 'DESC')
            ->where('offer', true)
            ->where('available', true)
            ->with('likesCount')
            ->with('isLiked')
            ->with(array('category' =>function($query){
                $query->select('id', 'name');
            }))->paginate(9);

        return response()->json($products, 200);
    }

}

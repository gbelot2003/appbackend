<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Like;
use App\Product;
use Illuminate\Http\Request;
use Throwable;

class LikesController extends Controller
{

    public function show($user_id)
    {
        $likes = Product::whereHas('likeds')
            ->Where('available', true)
            ->with('likesCount')
            ->with('isLiked')
            ->with(array('category' =>function($query){
                $query->select('id', 'name');
            }))
            ->select('id', 'name', 'image_url', 'description', 'price', 'category_id', 'offer', 'offer_price')
            ->get();

        return response()->json($likes, 200);
    }

    /**
     * @param $product_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function like($product_id)
    {
        $user = auth()->id();
        Like::create(['user_id' => $user, 'product_id' => $product_id]);
        return response()->json('Agregado a favoritos', 200);

    }

    /**
     * @param $product_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function dislike($product_id)
    {
        $user = auth()->id();
        $likes = Like::where('product_id', $product_id)
            ->where('user_id', $user)->first();


        $likes->delete();
        return response()->json('Removido de Favoritos', 200);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function add_favorites(Request $request, $id){
        $user = Auth::user();
        $user->favorites()->attach($id);
        return response()->json(['success' => 'Product added to favorites']);
    }

    public function remove_favorites(Request $request, $id){
        $user = Auth::user();
        $user->favorites()->detach($id);
        return response()->json(['success' => 'Product removed from favorites']);
    }

    public function show_favorites(){
        $user = Auth::user();
        $products = $user->favorites()->get();
        return view('favorites', compact('products'));
    }

}

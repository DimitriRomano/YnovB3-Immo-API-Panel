<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function add_favorites(Request $request, $id){
        $user_id = $request->user()->id;
        $favorite = new Favorite();
        $favorite->user_id = $user_id;
        $favorite->property_id = $id;
        $favorite->save();
        return response()->json(['success' => 'Product added to favorites']);
    }

    public function remove_favorites(Request $request, $id){
        $user_id = $request->user()->id;
        $favorite = Favorite::where('user_id', $user_id)->where('property_id', $id)->first();
        $favorite->delete();
        return response()->json(['success' => 'Product removed from favorites']);
    }

    public function show_favorites(Request $request){
        $user_id = $request->user()->id;
        $properties = Property::whereHas('favorites', function($q) use ($user_id){
            $q->where('user_id', $user_id);
        })->get();
        return response()->json(['properties' => $properties]);
    }

}

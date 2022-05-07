<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function toggle_favorites($id){
        $user_id = Auth::id();

        $favorite = Favorite::where('user_id', $user_id)->where('property_id', $id)->first();

        if($favorite){
            $favorite->delete();
        }else{
            $favorite = new Favorite();
            $favorite->user_id = $user_id;
            $favorite->property_id = $id;
            $favorite->save();
        }
        return response()->json(['success' => 'Property update.']);
    }

    public function show_favorites(){
        $user_id = Auth::id();
        $properties = Property::whereHas('favorites', function($q) use ($user_id){
            $q->where('user_id', $user_id);
        })->with('images')->get();

        foreach ($properties as $property) {
            $property->is_favorite = true;
        }
        return $properties;
    }

}

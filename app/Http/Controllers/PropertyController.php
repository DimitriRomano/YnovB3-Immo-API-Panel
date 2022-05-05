<?php

namespace App\Http\Controllers;

use App\Models\CategoryFeature;
use App\Models\Favorite;
use App\Models\Feature;
use App\Models\Image;
use App\Models\Localisation;
use App\Models\Property;
use App\Models\Type;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PropertyController extends Controller
{

    // ADMIN
    function create(Request $request)
    {
        $request->validate([
            'type' => 'required',
            'price' => 'required',
            'title' => 'required',
            'address' => 'required',
            'image' => 'required',
            'surface' => 'required',
            'localisation' => 'required',
            'features' => 'required'
        ]);

        $property = new Property();
//        if($request->hasFile('image')) {
//            $image = $request->file('image');
//            $imageName = time().'.'.$image->getClientOriginalExtension();
//            $image->move(public_path('images'), $imageName);
//            $property->image = $imageName;
//        }
        $property->price = $request->price;
        $property->title = $request->title;
        $property->description = $request->description;
        $property->address = $request->address;
        $property->image = $request->image;
        $property->surface = $request->surface;
        $property->type_id = Type::where('name', $request->type['name'])->first()->id;
        $property->save();
        $property->localisation()->create(['property_id' => $property->id, 'latitude' => $request->localisation['latitude'], 'longitude' => $request->localisation['longitude']]);

        $features = $request->features;
        foreach ($features as $feature) {
            $feature = Feature::firstOrCreate(
                [
                    'name' => $feature['name'],
                    'value' => $feature['value']
                ]
            );
            $property->features()->attach($feature);
        }

        $property->save();
        return redirect()->route('admin.properties');
    }

    function update(Request $request, $id)
    {
//        $request->validate([
//            'type' => 'required',
//            'price' => 'required',
//            'title' => 'required',
//            'address' => 'required',
//            'image' => 'required',
//            'surface' => 'required',
//            'localisation' => 'required',
//            'features' => 'required'
//        ]);
//
//        $property = Property::findOrFail($id);
//        if( $property){
////        if ($request->hasFile('image')) {
////            $image = $request->file('image');
////            $imageName = time().'.'.$image->getClientOriginalExtension();
////            $image->move(public_path('images'), $imageName);
////            $property->image = $imageName;
////        }
//            $property->price = $request->price;
//            $property->title = $request->title;
//            $property->description = $request->description;
//            $property->address = $request->address;
//            $property->image = $request->image;
//            $property->surface = $request->surface;
//            $property->type_id = Type::where('name', $request->type['name'])->first()->id;
//            $property->save();
//            $property->localisation()->update(['latitude' => $request->localisation['latitude'], 'longitude' => $request->localisation['longitude']]);
//
//            $features = $request->features;
//            foreach ($features as $feature) {
//                $feature = Feature::firstOrCreate(
//                    [
//                        'name' => $feature['name'],
//                        'value' => $feature['value']
//                    ]
//                );
//                $property->features()->attach($feature);
//            }
//
//            $property->save();
//            return redirect()->route('admin.properties');
//        }else{
//            return redirect()->route('admin.properties');
//        }$

        $property = Property::findOrFail($id);
        $property->title = $request->title;
        $property->save();
        return "hello";

    }

    function admin_delete(Request $request, $id)
    {
        $property = Property::find($id);
        if ($property) {
            $property->delete();

            $localisation = Localisation::where('property_id', $id)->first();
            $localisation->delete();
            return redirect()->route('admin.properties');
        } else {
            return redirect()->route('admin.properties');
        }
    }

    function findAll()
    {
        $user_id = Auth::id();
        $properties = Property::all();
        foreach ($properties as $property) {
            if(Auth::check()) {
                $property->is_favorite = (bool)Favorite::where('property_id', $property->id)->where('user_id', $user_id)->first();
            }else{
                $property->is_favorite = false;
            }
            $property->type = Type::find($property->type_id);
            $property->images = Image::where('property_id', $property->id)->get();
        }
        if($properties){
            return response()->json($properties, 200);
        }else{
            return response()->json("Pas de propriétés trouvé", 404);
        }
    }

    function findOne($id)
    {
        $user_id = Auth::id();
        $property = Property::where('id', $id)
            ->with('localisation')
            ->with('type')
            ->with('features.category_features')
            ->with('images')
            ->first();

        if($property) {
            if(Auth::check()) {
                $property->is_favorite = (bool)Favorite::where('property_id', $property->id)->where('user_id', $user_id)->first();
            }else{
                $property->is_favorite = false;
            }
            return $property;
        } else {
            return response()->json("Property not found", 404);
        }
    }

}

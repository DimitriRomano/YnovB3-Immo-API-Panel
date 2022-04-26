<?php

namespace App\Http\Controllers;

use App\Models\CategoryFeature;
use App\Models\Feature;
use App\Models\Localisation;
use App\Models\Property;
use App\Models\Type;
use Illuminate\Http\Request;

class PropertyController extends Controller
{

    // ADMIN
    function admin_store(Request $request)
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
        return response()->json('Property created', 201);
    }

    function admin_update(Request $request, $id)
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

        $property = Property::findOrFail($id);
        if( $property){
//        if ($request->hasFile('image')) {
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
            $property->localisation()->update(['latitude' => $request->localisation['latitude'], 'longitude' => $request->localisation['longitude']]);

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
            return response()->json('Property updated', 200);
        }else{
            return response()->json('Property not found', 404);
        }
    }

    function admin_delete(Request $request, $id)
    {
        $property = Property::find($id);
        if ($property) {
            $property->delete();

            $localisation = Localisation::where('property_id', $id)->first();
            $localisation->delete();
            return response()->json("Property deleted", 200);
        } else {
            return response()->json("Property not found", 404);
        }
    }

    // GLOBAL
    function findAll()
    {
        return Property::with('type')->with('images')->get();
    }

    function findOne($id)
    {
        $property = Property::where('id', $id)
            ->with('localisation')
            ->with('type')
            ->with('features.category_features')
            ->with('images')
            ->first();


        if($property) {
            return $property;
        } else {
            return response()->json("Property not found", 404);
        }
    }

}

<?php

namespace App\Http\Controllers;

use App\Models\Feature;
use App\Models\Localisation;
use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{

    // ADMIN
    function admin_index()
    {
        return Property::with('type')->get();
    }

    function admin_store(Request $request)
    {
        $property = new Property();
        $property->type_id = $request->type_id;
        $property->price = $request->price;
        $property->title = $request->title;
        $property->description = $request->description;
        $property->address = $request->address;
        $property->image = $request->image;
        $property->surface = $request->surface;
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
        $property = Property::findOrFail($id);
        $property->type_id = $request->type_id;
        $property->price = $request->price;
        $property->title = $request->title;
        $property->description = $request->description;
        $property->address = $request->address;
        $property->image = $request->image;
        $property->surface = $request->surface;
        $property->localisation()->create($request->localisation);
        $property->type_id = Type::where('name', $request->type)->first()->id;
        $property->features()->sync($request->features);
        $property->save();

        return response()->json("Property updated", 200);
    }

    function admin_delete(Request $request, $id)
    {
        $property = Property::findOrFail($id);
        $property->delete();

        $localisation = Localisation::where('property_id', $id)->first();
        $localisation->delete();

        return response()->json('Property deleted successfully', 200);
    }

    // GLOBAL
    function show($id)
    {
        return Property::where('id', $id)
            ->with('localisation')
            ->with('type')
            ->with('features')
            ->get();
    }

    //USER
}

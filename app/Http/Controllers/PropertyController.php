<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    function index()
    {
        return Property::with('type')
            ->with('localisation')
            ->with('features')
            ->get();
    }

    function show($id)
    {
        return Property::find($id);
    }

    function store(Request $request)
    {
        return Property::create($request->all());
    }

    function update(Request $request, $id)
    {
        $property = Property::findOrFail($id);
        $property->update($request->all());

        return $property;
    }

    function delete(Request $request, $id)
    {
        $property = Property::findOrFail($id);
        $property->delete();

        return response()->json(['message' => 'Property deleted successfully']);
    }

}

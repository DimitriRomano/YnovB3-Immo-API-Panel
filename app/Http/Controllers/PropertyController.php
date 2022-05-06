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
        $property = new Property();
        $main_image = $request->main_image;
        $imagesSecondaries = $request->images;
        if($main_image){
            $imageName = time().'.'.$main_image->getClientOriginalExtension();
            $main_image->move(public_path('img'), $imageName);
            $imagePath = '/img/'.$imageName;
            $property->main_image = $imagePath;
        }
        $property->title = $request->title;
        $property->price = $request->price;
        $property->description = $request->description;
        $property->address = $request->address;
        $property->surface = $request->surface;
        $property->type_id = $request->type_id;
        $property->nb_rooms = $request->nb_rooms;
        $property->save();



        if($imagesSecondaries) {
            foreach ($imagesSecondaries as $imagesSecondary) {
                $imageName = time() . '.' . $imagesSecondary->getClientOriginalExtension();
                $imagesSecondary->move(public_path('img/properties'), $imageName);
                $imagePath ='/img/properties/' . $imageName;

                $image = new Image();
                $image->url = $imagePath;
                $image->property_id = $property->id;
                $image->save();
            }
        }

        $localisation = new Localisation();
        $localisation->property_id = $property->id;
        $localisation->latitude = $request->latitude;
        $localisation->longitude = $request->longitude;
        $localisation->save();

        $features = $request->features;

        $property->features()->detach();
        foreach ($features as $feature) {
            $property->features()->attach($feature);
        }
        $property->save();

        return redirect()->route('admin.properties');
    }

    function update(Request $request, $id)
    {

        $main_image = $request->main_image;
        $property = Property::findOrFail($id);
        if($main_image){
           $imageName = time().'.'.$main_image->getClientOriginalExtension();
           $main_image->move(public_path('img\properties'), $imageName);
            $imagePath = '/img/'.$imageName;
           $property->main_image = $imagePath;
        }

        $imagesSecondaries = $request->images;
        if($imagesSecondaries) {
            foreach ($imagesSecondaries as $imagesSecondary) {
                $imageName = time() . '.' . $imagesSecondary->getClientOriginalExtension();
                $imagesSecondary->move(public_path('img/properties'), $imageName);
                $imagePath = '/img/properties/' . $imageName;

                $image = new Image();
                $image->url = $imagePath;
                $image->property_id = $property->id;
                $image->save();
            }
        }

        $property->title = $request->title;
        $property->price = $request->price;
        $property->description = $request->description;
        $property->address = $request->address;
        $property->surface = $request->surface;
        $property->type_id = $request->type_id;
        $property->nb_rooms = $request->nb_rooms;
        $property->save();
        $property->localisation()->update(['latitude' => $request->latitude, 'longitude' => $request->longitude]);

        $features = $request->features;

        $property->features()->detach();
        foreach ($features as $feature) {
            $property->features()->attach($feature);
        }
        $property->save();

        return redirect()->route('admin.properties');

    }

    function admin_delete($id)
    {
        $property = Property::find($id);
        $property->delete();

        $localisation = Localisation::where('property_id', $id)->first();
        $localisation->delete();
        return redirect()->route('admin.properties');
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

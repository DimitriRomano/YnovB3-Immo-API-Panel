<?php

namespace App\Http\Controllers;

use App\Models\Feature;
use App\Models\Localisation;
use App\Models\Property;
use App\Models\Type;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware( 'adminWeb');
    }

    public function getDashboard()
    {
        return view('dashboard.home');
    }

    public function getUser()
    {
        return view('dashboard.user');
    }

    public function getProperties()
    {
        $properties = Property::all();
        return view('dashboard.properties', compact('properties'));
    }

    public function getProperty()
    {
//        return view('dashboard.property');
        return "Soon";
    }

    public function getFormCreate()
    {
        return view('dashboard.properties');
    }

    public function getFormEdit($id)
    {
        $property = Property::find($id);
        $features = Feature::all();
        $types = Type::all();

        return view('dashboard.properties', compact('property', 'features', 'types'));
    }

    function delete_offer(Request $request, $id)
    {
        $property = Property::find($id);
        if ($property) {
            $property->delete();

            $localisation = Localisation::where('property_id', $id)->first();
            $localisation->delete();
            return redirect()->back()->with('success', 'Offer deleted successfully');
        } else {
            return redirect()->back()->with('error', 'Offer not found');
        }
    }
}

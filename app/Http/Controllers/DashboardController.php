<?php

namespace App\Http\Controllers;

use App\Models\Feature;
use App\Models\Localisation;
use App\Models\Property;
use App\Models\Role;
use App\Models\Type;
use App\Models\User;
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
        $features = Feature::all();
        $types = Type::all();

        return view('dashboard.properties', compact('features', 'types'));
    }

    public function getFormEdit($id)
    {
        $property = Property::find($id);
        $features = Feature::all();
        $types = Type::all();

        return view('dashboard.properties', compact('property', 'features', 'types'));
    }

    public function admin_user_edit($id){
        $user = User::find($id);
        $roles = Role::all();

        return view('dashboard.users', compact('user', 'roles'));
    }
}

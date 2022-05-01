<?php

namespace App\Http\Controllers;

use App\Models\Property;
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
        $properties = Property::all();
        return view('dashboard.home', compact('properties'));
    }

    public function getUser()
    {
        return view('dashboard.user');
    }

    public function getProperty()
    {
        return view('dashboard.property');
    }

    public function getOffer()
    {
        return view('dashboard.offer');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\User;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function create($id){
        $reservation = Reservation::where('property_id',$id)->where('user_id',Auth::user()->id)->first();
        if($reservation){
            return response()->json(['error'=>'Vous avez déjà une réservation pour cette propriété'],422);
        }else{
            $reservation = new Reservation;
            $reservation->user_id = Auth::id();
            $reservation->property_id = $id;
            $reservation->save();

            return response()->json(['success' => 'Merci, nous traitons votre demande.']);
        }


    }

    public function accept($id){
        $reservation = Reservation::find($id);
        $reservation->status = 'approved';
        $reservation->save();

        return redirect()->back()->with('success', 'Réservation acceptée.');
    }

    public function decline($id){
        $reservation = Reservation::find($id);
        $reservation->status = 'rejected';
        $reservation->save();

        return redirect()->back()->with('success', 'Réservation refusé.');
    }

    public function destroy($id){
        $reservation = Reservation::find($id);
        $reservation->delete();

        return response()->json(['success' => 'Réservation supprimé.']);
    }

    public function allProperties(){
        $all_properties = Property::withCount('reservations')->orderBy('reservations_count', 'desc')->get();

        $properties = $all_properties->filter(function ($property) {
            return $property->reservations_count > 0;
        });

        return view('dashboard.reservations', compact('properties'));
    }

    public function allReservationForProperty($idProperty){
        $reservations = Reservation::where('property_id', $idProperty)->get();
        $property = Property::find($idProperty);

        return view('dashboard.reservations', compact('reservations', 'property'));
    }

    public function allReservationForUser(){
        $reservations = Reservation::where('user_id', Auth::id() )->get();
        return view('dashboard.user.reservations', compact('reservations'));
    }

    public function user_reservations(){
        $user = User::find(Auth::id())->with('reservations.property.type')->first();
        return $user;
    }
}

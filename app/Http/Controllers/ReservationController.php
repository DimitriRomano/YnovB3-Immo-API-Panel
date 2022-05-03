<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function create($id){
        $reservation = new Reservation;
        $reservation->user_id = Auth::id();
        $reservation->property_id = $id;
        $reservation->status = 'in progress';
        $reservation->save();

        return response()->json(['success' => 'Merci, nous traitons votre demande.']);
    }

    public function accept($id){
        $reservation = Reservation::find($id);
        $reservation->status = 'approved';
        $reservation->save();

        return response()->json(['success' => 'Réservation accepté.']);
    }

    public function decline($id){
        $reservation = Reservation::find($id);
        $reservation->status = 'rejected';
        $reservation->save();

        return response()->json(['success' => 'Reservation declined.']);
    }

}

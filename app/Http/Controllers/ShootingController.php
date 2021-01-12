<?php

namespace App\Http\Controllers;

use App\Shooting;
use Illuminate\Http\Request;
use App\Http\Requests\ShootingRequest;

class ShootingController extends Controller
{
    public function index()
    {
        return view('shooting.index');
    }

    public function reservation()
    {
        return view('shooting.reservation');
    }

    public function store(ShootingRequest $request)
    {
        Shooting::create([
            'user_id' => auth()->user() ? auth()->user()->id : null,
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'phone' => $request->phone,
            'email' => $request->email,
            'seance_date' => $request->seance_date
           
        ]);

        return redirect()->back()->with('success_message','Votre réservation a bien été prise en compte');
    }   
}

<?php

namespace App\Http\Controllers;

use App\Mariage;
use App\MariageReservation;
use Illuminate\Http\Request;
use App\Http\Requests\MariageRequest;

class MariageController extends Controller
{
    public function index()
    {
        $packsMariage = Mariage::all();

        return view('mariage.index')->with('packs',$packsMariage);
    }

    
    public function reservation()
    {
        $packsMariage = Mariage::all();
      
        return view('mariage.reservation')->with('packs',$packsMariage);
    }



    public function store(MariageRequest $request)
    {
        $packName = Mariage::find($request->packs);
        MariageReservation::create([
            'user_id' => auth()->user() ? auth()->user()->id : null,
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'phone' => $request->phone,
            'pack' => $packName->pack,
            'email' => $request->email,
            'reservation_date' => $request->reservation_date
           
        ]);

        return redirect()->back()->with('success_message','Votre réservation a bien été prise en compte');
    }  
}


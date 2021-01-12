<?php

namespace App\Http\Controllers;

use App\Event;
use App\EventReservation;
use Illuminate\Http\Request;
use App\Http\Requests\EventRequest;

class EventController extends Controller
{
    public function index()
    {
        $packsEvent = Event::all();
        return view('event.index')->with('packs',$packsEvent);
    }

    public function reservation()
    {
        $packsEvent = Event::all();
        return view('event.reservation')->with('packs',$packsEvent);
    }


    public function store(EventRequest $request)
    {
        $packName = Event::find($request->packs);
        EventReservation::create([
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

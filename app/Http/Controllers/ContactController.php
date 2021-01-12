<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;
use App\Http\Requests\MariageRequest;
use App\Http\Requests\MessageRequest;

class ContactController extends Controller
{
   public function index()
   {
       return view('contact.index');
   }

   public function store(MessageRequest $request)
   {
           Message::create([
                'nom' => $request->nom,
                'email' => $request->email,
                'message' => $request->message
           ]);

           return redirect()->back()->with('success_message','Votre message a bien été prise en compte');

   }
}

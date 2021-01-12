<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaboController extends Controller
{
    public function index()
    {
        return view('labo.index');
    }
}

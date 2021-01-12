<?php

namespace App\Http\Controllers;

use App\Format;
use Illuminate\Http\Request;

class StudioController extends Controller
{
    public function index()
    {
        return view('studio.index');
    }

    public function print()
    {
        return view('studio.print');
    }


    public function format()
    {
        $formats = Format::all();
       
        return view('studio.format')->with('formats',$formats);
    }
}

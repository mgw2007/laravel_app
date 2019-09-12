<?php

namespace App\Http\Controllers;

use App\FmcsaCensus;

use Illuminate\Http\Request;

class SearchController extends Controller
{
  
    public function index()
    {
        return view('transportation.search');
    }
  
    public function autocompleteDotNumber(Request $request)
    {
        return FmcsaCensus::where('dot_number', 'LIKE', '%'.$request->q.'%')->get();
    }
}

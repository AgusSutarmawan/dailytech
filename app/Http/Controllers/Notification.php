<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
class Notification extends Controller
{
    public function notification() 
    { 
        $response = Http::get('http://localhost:3030/notification'); 
        $collection = $response->collect(); 
        if (Auth::user()->role == 'admin'){
        return view('notification', ['collection' => $collection]);
        }
        else{
        $filtered = $collection->whereIn('userID', [Auth::user()->id])->reverse(); 
        return view('notification', ['filtered' => $filtered]); 
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IPController extends Controller
{
    public function geolocator() {
        return view('layouts.auth.geolocator');
    }

    public function get_ip_details(Request $request) {
        $ip = $request->ip;
   
        $arr_ip = geoip()->getLocation($ip);
        

        return view('layouts.auth.geolocator', compact('arr_ip'));
    }
    
}

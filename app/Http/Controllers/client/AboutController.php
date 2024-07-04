<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\About_us;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index(){
        $About_us  = About_us::first();
        return view('client.about.about',compact('About_us'));
    }   
}

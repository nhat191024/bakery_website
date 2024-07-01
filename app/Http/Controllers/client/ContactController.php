<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Contact_infos;
use App\Models\Contact_us;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
        $Contact_us  = Contact_us::find(1);
        return view('client.contact.contact',compact('Contact_us'));
    }

}

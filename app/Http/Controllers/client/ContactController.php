<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Models\Categories;
use App\Models\Contact_infos;
use App\Models\Contact_us;
use App\Models\Message;
use App\Service\client\MessageService;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    private $messageService;

    public function __construct(MessageService $messageService)
    {
        $this->messageService = $messageService;
    }
    public function index(){
        $Contact_us  = Contact_us::find(1);
        return view('client.contact.contact',compact('Contact_us'));
    }
    public function store(Request $request){
     $table = $request->all('name','email','subject','message');
     $this->messageService->create($table);
     return redirect()->route('client.contact.index')->with('success','Message sent successfully');
    }
}

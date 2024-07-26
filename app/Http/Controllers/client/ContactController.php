<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Contact_us;
use App\Service\client\MessageService;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    private $messageService;

    public function __construct(MessageService $messageService)
    {
        $this->messageService = $messageService;
    }
    public function index()
    {
        $Contact_us  = Contact_us::find(1);
        return view('client.contact.contact', compact('Contact_us'));
    }
    public function store(Request $request)
    {
        $lang = session()->get('language');
        $table = $request->all('name', 'email', 'phone', 'subject', 'message');
        $this->messageService->create($table);
        if ($lang == 'en') {
            return redirect()->route('client.contact.index')->with('success', 'Thank you for contacting us!');
        }
        return redirect()->route('client.contact.index')->with('success', 'Cảm ơn bạn đã liên hê với chúng tôi!');
    }
}

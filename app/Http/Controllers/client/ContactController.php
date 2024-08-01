<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Contact_us;
use App\Service\client\MessageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        $success_vi = 'Cảm ơn đã liên hệ với chúng tôi!';
        $success_en = 'Thank you for contacting us!';
        $error_vi = 'Vui lòng nhập thông tin hợp lê!';
        $error_en = 'Please enter the correct information!';

        $lang = session()->get('language');
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:9',
        ]);

        if ($validator->fails()) {
            return redirect()->route('client.contact.index')
                             ->withInput()
                             ->with('error', $lang == 'en' ? $error_en : $error_vi);
        }
        $table = $request->all('name', 'email', 'phone', 'subject', 'message');
        $this->messageService->create($table);
        return redirect()->route('client.contact.index')->with('success', $lang == 'en' ? $success_en : $success_vi);
    }
}

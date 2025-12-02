<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Chat;
use App\Models\ChatMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use MongoDB\BSON\ObjectId;

class ChatController extends Controller
{
    // Lấy hoặc tạo chat của session hiện tại
    public function current()
    {
        $sessionId = Session::getId();

        $chat = Chat::firstOrCreate(
            ['session_id' => $sessionId, 'status' => 'open'],
            ['created_at' => now()]
        );

        return response()->json([
            'chat_id' => (string) $chat->_id,
            'name'    => $chat->name,
            'phone'   => $chat->phone,
        ]);
    }

    // Lấy danh sách message của chat
    public function messages(Request $request)
    {
        $chatId = $request->query('chat_id');

        $messages = ChatMessage::where('chat_id', $chatId)
            ->orderBy('created_at', 'asc')
            ->get()
            ->map(function ($m) {
                return [
                    'id'         => (string) $m->_id,
                    'sender'     => $m->sender,
                    'text'       => $m->text,
                    'created_at' => $m->created_at,
                ];
            });

        return response()->json($messages);
    }

    // Guest gửi tin nhắn
    public function send(Request $request)
    {
        $request->validate([
            'chat_id' => 'required|string',
            'text'    => 'required|string|max:1000',
        ]);

        $msg = ChatMessage::create([
            'chat_id'    => $request->chat_id,
            'sender'     => 'guest',
            'text'       => $request->text,
            'created_at' => now(),
        ]);

        return response()->json([
            'success' => true,
            'message' => [
                'id'         => (string) $msg->_id,
                'sender'     => $msg->sender,
                'text'       => $msg->text,
                'created_at' => $msg->created_at,
            ],
        ]);
    }

    // CẬP NHẬT THÔNG TIN KHÁCH (name + phone)
    public function updateInfo(Request $request)
    {
        $request->validate([
            'chat_id' => 'required|string',
            'name'    => 'nullable|string|max:100',
            'phone'   => 'nullable|string|max:20',
        ]);

        try {
            // Chat::_id là ObjectId nên mình cast cho chắc
            $objectId = new ObjectId($request->chat_id);
        } catch (\Throwable $e) {
            logger()->error('Chat updateInfo invalid id: ' . $e->getMessage());
            return response()->json(['success' => false, 'message' => 'Invalid chat id'], 400);
        }

        $chat = Chat::where('_id', $objectId)->first();

        if (!$chat) {
            return response()->json(['success' => false, 'message' => 'Chat not found'], 404);
        }

        $chat->name  = $request->name;
        $chat->phone = $request->phone;
        $chat->save();

        return response()->json(['success' => true]);
    }
}

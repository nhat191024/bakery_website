<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Chat;
use App\Models\ChatMessage;
use Illuminate\Http\Request;
use MongoDB\BSON\ObjectId;

class AdminChatController extends Controller
{
    // Danh sách tất cả cuộc chat
    public function index()
    {
        // Lấy tất cả chat, mới nhất lên đầu
        $chats = Chat::orderBy('created_at', 'desc')->get();

        return view('admin.chats.index', compact('chats'));
    }

    // Xem chi tiết 1 cuộc chat + toàn bộ messages
    public function show($id)
    {
        try {
            $objectId = new ObjectId($id);
        } catch (\Throwable $e) {
            abort(404);
        }

        $chat = Chat::where('_id', $objectId)->firstOrFail();

        // ChatMessage lưu chat_id là string chat->_id
        $messages = ChatMessage::where('chat_id', $id)
            ->orderBy('created_at', 'asc')
            ->get();

        return view('admin.chats.show', [
            'chat' => $chat,
            'chatId' => $id,       // string dùng cho form reply
            'messages' => $messages,
        ]);
    }

    // Admin gửi tin nhắn trả lời
    public function reply(Request $request, $id)
    {
        $request->validate([
            'text' => 'required|string|max:1000',
        ]);

        try {
            $objectId = new ObjectId($id);
        } catch (\Throwable $e) {
            return back()->with('error', 'Cuộc chat không hợp lệ');
        }

        $chat = Chat::where('_id', $objectId)->first();

        if (!$chat) {
            return back()->with('error', 'Không tìm thấy cuộc chat');
        }

        ChatMessage::create([
            'chat_id' => $id,           // string _id
            'sender' => 'admin',
            'text' => $request->text,
            'created_at' => now(),
        ]);

        return back()->with('success', 'Đã gửi trả lời cho khách.');
    }

    public function messages($id)
    {
        $messages = ChatMessage::where('chat_id', $id)
            ->orderBy('created_at', 'asc')
            ->get();

        return response()->json($messages);
    }
}

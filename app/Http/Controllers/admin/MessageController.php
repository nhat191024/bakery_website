<?php

namespace App\Http\Controllers\admin;

use App\Helper\Helper;
use App\Http\Controllers\Controller;
use App\Service\admin\MessageService;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    private $messageService;
    // //
    public function __construct(MessageService $messageService)
    {
        $this->messageService = $messageService;
    }

    public function index()
    {
        $allMessage = $this->messageService->getAll();
        return view('admin.message.message', compact('allMessage'))->with('helper', new Helper());
    }

    public function showDeleted()
    {
        $deletedMessage = $this->messageService->getAllDeleted();
        return view('admin.message.deleted_message', compact('deletedMessage'))->with('helper', new Helper());
    }

    public function showMessageDetail(Request $request)
    {
        $id = $request->id;
        $messageInfo = $this->messageService->getById($id);
        return view('admin.message.detail_message', compact('id', 'messageInfo'))->with('helper', new Helper());
    }

    public function showDeletedMessageDetail(Request $request)
    {
        $id = $request->id;
        $messageInfo = $this->messageService->recoverById($id);
        $this->messageService->deleteById($id);
        return view('admin.message.detail_message', compact('id', 'messageInfo'))->with('helper', new Helper());
    }

    public function deleteMessage(Request $request)
    {
        $this->messageService->deleteById($request->id);
        return redirect(route('admin.message.index'))->with('success','Đã đánh dấu tin nhắn đó là "Đã đọc"');
    }

    public function getUnread()
    {
        $unreadMessage = $this->messageService->getAll();
        return $unreadMessage;
    }
}

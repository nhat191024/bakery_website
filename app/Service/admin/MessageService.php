<?php

namespace App\Service\admin;

use App\Models\Message;

class MessageService
{
    public function getAll($perPage = 10)
    {
        return Message::select('id', 'name', 'email', 'phone', 'subject', 'message', 'created_at')
            ->orderBy('created_at', 'desc')
            ->paginate($perPage);
    }

    public function getAllDeleted($perPage = 10)
    {
        return Message::onlyTrashed()
            ->select('id', 'name', 'email', 'phone', 'subject', 'message', 'created_at', 'deleted_at')
            ->orderBy('deleted_at', 'desc')
            ->paginate($perPage);
    }

    public function getById($id)
    {
        return Message::find($id);
    }

    public function getUnreadSummary($limit = 5)
    {
        return [
            'count' => Message::count(),
            'messages' => Message::select('id', 'name', 'subject', 'message', 'created_at')
                ->orderBy('created_at', 'desc')
                ->limit($limit)
                ->get(),
        ];
    }

    public function recoverById($id)
    {
        $message = Message::withTrashed()->findOrFail($id);
        $message->restore();
        return $message;
    }

    public function deleteById($id)
    {
        Message::whereKey($id)->delete();
    }

    public function deleteAll()
    {
        Message::query()->delete();
    }
}

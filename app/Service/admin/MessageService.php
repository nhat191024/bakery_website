<?php

namespace App\Service\admin;

use App\Models\Message;

class MessageService
{
    public function getAll()
    {
        $message = Message::orderBy('created_at', 'desc')->get();
        return $message;
    }

    public function getAllDeleted()
    {
        $message = Message::onlyTrashed()->orderBy('deleted_at', 'desc')->get();
        return $message;
    }

    public function getById($id)
    {
        return Message::where('id', $id)->first();
    }

    public function recoverById($id)
    {
        $message = Message::withTrashed()->find($id);
        $message->restore();
        return $message;
    }

    public function deleteById($id)
    {
        try {
            $message = Message::find($id);
            $message->delete();
        } catch (\Throwable $th) {
        }
    }
}

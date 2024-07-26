<?php

namespace App\Service\client;

use App\Models\Message;

class MessageService
{
    public function getAll() {
        return Message::all();
    }

    public function create($table) {
        // dd($table);
        Message::create([
            'name' => $table['name'],
            'email' => $table['email'],
            'phone' => $table['phone'],
            'subject' => $table['subject'],
            'message' => $table['message'],
        ]);
    }
}

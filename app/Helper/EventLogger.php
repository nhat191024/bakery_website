<?php

namespace App\Helpers;

use App\Models\EventLog;
use Illuminate\Support\Facades\Session;

class EventLogger
{
    public static function log(string $type, array $data = []): void
    {
        try {
            EventLog::create([
                'session_id' => Session::getId(),
                'type'       => $type,
                'data'       => $data,
                'created_at' => now(),
                'ip'         => request()->ip(),
                'user_agent' => request()->userAgent(),
            ]);
        } catch (\Throwable $e) {
            logger()->error('Event log error: '.$e->getMessage());
        }
    }
}

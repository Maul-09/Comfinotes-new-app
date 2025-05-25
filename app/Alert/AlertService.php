<?php

namespace App\Alerts;

use App\Models\User;
use App\Models\Alerts\Alert;

class AlertService
{
    public static function send(User $user, string $title, string $message): Alert
    {
        return Alert::create([
            'user_id' => $user->id,
            'title'   => $title,
            'message' => $message,
            'sent_at' => now(),
        ]);
    }
}

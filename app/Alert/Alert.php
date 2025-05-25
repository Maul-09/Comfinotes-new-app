<?php

namespace App\Models\Alerts;

use Illuminate\Database\Eloquent\Model;


class Alert extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'message',
        'is_read',
        'sent_at'
    ];

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

}

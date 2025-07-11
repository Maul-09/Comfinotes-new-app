<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class SubmissionModel extends Model
{
    protected $table = 'transaction';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [
        'user_id',
        'departemen_id',
        'amount',
        'event_name',
        'status',
        'submission_date',
        'keterangan'
    ];

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    public function departemen()
    {
        return $this->belongsTo(\App\Models\User\DepartemenModel::class);
    }

}

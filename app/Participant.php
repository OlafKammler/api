<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    protected $fillable = [
        'code',
        'session_id'
    ];

    public function session()
    {
        return $this->belongsTo(Session::class);
    }
}

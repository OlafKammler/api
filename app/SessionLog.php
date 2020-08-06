<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SessionLog extends Model
{
    protected $fillable = [
        'participant_id',
        'session_id',
        'content',
        'category_id'
    ];

    public function participant()
    {
        return $this->belongsTo(Participant::class);
    }

    public function session()
    {
        return $this->belongsTo(Session::class);
    }

    public function category()
    {
        return $this->belongsTo(LogCategory::class, 'category_id');
    }
}

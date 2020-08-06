<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $fillable = [
        'form_id',
        'form_field_id',
        'participant_id',
        'data',
        'last_edited'
    ];

    public function form()
    {
        return $this->belongsTo(Form::class);
    }

    public function formField()
    {
        return $this->belongsTo(FormField::class);
    }

    public function participant()
    {
        return $this->belongsTo(Participant::class);
    }
}

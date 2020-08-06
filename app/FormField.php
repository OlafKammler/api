<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FormField extends Model
{
    protected $fillable = [
        'list_position',
        'template',
        'form_id'
    ];

    public function form()
    {
        return $this->belongsTo(Form::class);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LogCategory extends Model
{
    protected $fillable = [
        'name',
        'description'
    ];
}

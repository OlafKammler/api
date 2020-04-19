<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['name', 'description'];

    public function forms() {
        return $this->hasMany(Form::class);
    }
}

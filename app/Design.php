<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Design extends Model
{
    protected $fillable = ['project_id', 'name', 'description', 'data'];

    public function project() {
        return $this->belongsTo(Project::class);
    }
}

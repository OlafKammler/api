<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ProjectUser extends Model
{
    public $incrementing = false;

    protected $fillable = ['role'];

    public function role()
    {
        return $this->role;
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'description'];

    public function users()
    {
        return $this->belongsToMany(User::class)
            ->as('membership')
            ->withPivot(['role'])
            ->withTimestamps();
    }

    public function forms()
    {
        return $this->hasMany(Form::class);
    }

    public function playlists()
    {
        return $this->hasMany(Playlist::class);
    }

    public function scenarios()
    {
        return $this->hasMany(Scenario::class);
    }

    public function checkpoints()
    {
        return $this->hasMany(Checkpoint::class);
    }

    public function contextModels()
    {
        return $this->hasMany(ContextModel::class);
    }
}

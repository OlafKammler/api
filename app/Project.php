<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'description'];

    public function memberships()
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

    public function modelContexts()
    {
        return $this->hasMany(ModelContext::class);
    }
    public function modelArchitectures()
    {
        return $this->hasMany(ModelArchitecture::class);
    }
    public function modelSceneries()
    {
        return $this->hasMany(ModelScenery::class);
    }
}

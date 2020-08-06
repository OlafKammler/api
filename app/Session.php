<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    protected $fillable = [
        'name',
        'description',
        'project_id',
        'playlist_id'
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function playlist()
    {
        return $this->belongsTo(Playlist::class);
    }
}

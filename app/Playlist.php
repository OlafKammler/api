<?php

namespace App;

use App\ProjectComponent;

class Playlist extends ProjectComponent
{
    protected $childCollectionType = Scenario::class;
    protected $identificatedName = 'playlist_id';
    protected $identificatedItemName = 'scenario_id';
}

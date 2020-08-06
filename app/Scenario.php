<?php

namespace App;

use App\ProjectComponent;

class Scenario extends ProjectComponent
{
    protected $childCollectionType = Checkpoint::class;
    protected $identificatedName = 'scenario_id';
    protected $identificatedItemName = 'checkpoint_id';

    public function context()
    {
        return $this->belongsTo(ModelContext::class, 'model_context_id');
    }

    public function architecture()
    {
        return $this->belongsTo(ModelArchitecture::class, 'model_architecture_id');
    }

    public function scenery()
    {
        return $this->belongsTo(ModelScenery::class, 'model_scenery_id');
    }
}

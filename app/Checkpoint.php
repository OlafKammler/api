<?php

namespace App;

use App\ProjectComponent;

class Checkpoint extends ProjectComponent
{
    protected $childCollectionType = Form::class;
    protected $identificatedName = 'checkpoint_id';
    protected $identificatedItemName = 'form_id';
}

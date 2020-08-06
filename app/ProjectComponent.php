<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

abstract class ProjectComponent extends Model
{
    protected $fillable = ['project_id', 'name', 'description'];
    protected $childCollectionType;
    protected $identificatedName;
    protected $identificatedItemName;

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function items()
    {
        return $this->belongsToMany($this->childCollectionType)
            ->withPivot(['list_position']);
    }

    public function updateItems(array $itemIds)
    {
        $data = [];
        for ($i = 0; $i < count($itemIds); $i++) {
            $data[$itemIds[$i]] = [
                $this->identificatedName => $this->id,
                'project_id' => $this->project->id,
                'list_position' => $i
            ];
        }
        $this->items()->sync($data);
    }

    public function orderedItemIds()
    {
        $pivot = [];
        foreach ($this->items as $item) {
            $pivot[$item->pivot->list_position] = $item->pivot[$this->identificatedItemName];
        }
        ksort($pivot);
        return $pivot;
    }
}

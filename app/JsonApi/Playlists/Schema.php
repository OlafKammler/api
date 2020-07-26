<?php

namespace App\JsonApi\Playlists;

use Neomerx\JsonApi\Schema\SchemaProvider;

class Schema extends SchemaProvider
{

    /**
     * @var string
     */
    protected $resourceType = 'playlists';

    /**
     * @param $resource
     *      the domain record being serialized.
     * @return string
     */
    public function getId($resource)
    {
        return (string) $resource->getRouteKey();
    }

    /**
     * @param $resource
     *      the domain record being serialized.
     * @return array
     */
    public function getAttributes($resource)
    {
        return [
            'name' => $resource->name,
            'description' => $resource->description,
            'data' => $resource->data,
            'scenario-order' => $resource->orderedScenarioIds(),
            'created-at' => $resource->created_at->toAtomString(),
            'updated-at' => $resource->updated_at->toAtomString(),
        ];
    }

    public function getRelationships($resource, $isPrimary, array $includeRelationships)
    {
        return [
            'project' => [
                self::SHOW_SELF => true,
                self::SHOW_RELATED => true,
            ],
            'scenarios' => [
                self::SHOW_SELF => true,
                self::SHOW_RELATED => true,
                self::SHOW_DATA => isset($includeRelationships['scenarios']),
                self::DATA => function () use ($resource) {
                    return $resource->scenarios;
                }
            ],
        ];
    }

    public function getIncludePaths()
    {
        return ['scenarios'];
    }
}

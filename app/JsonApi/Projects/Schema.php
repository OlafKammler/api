<?php

namespace App\JsonApi\Projects;

use Neomerx\JsonApi\Schema\SchemaProvider;

class Schema extends SchemaProvider
{

    /**
     * @var string
     */
    protected $resourceType = 'projects';

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
            'created-at' => $resource->created_at->toAtomString(),
            'updated-at' => $resource->updated_at->toAtomString(),
            'deleted-at' => isset($resource->deleted_at) ? $resource->deleted_at : null,
        ];
    }

    public function getRelationships($resource, $isPrimary, array $includeRelationships)
    {
        return [
            'memberships' => [
                self::SHOW_SELF => true,
                self::SHOW_RELATED => true,
            ],
            'forms' => [
                self::SHOW_SELF => true,
                self::SHOW_RELATED => true,
                self::SHOW_DATA => isset($includeRelationships['forms']),
                self::DATA => function () use ($resource) {
                    return $resource->forms;
                }
            ],
            'checkpoints' => [
                self::SHOW_SELF => true,
                self::SHOW_RELATED => true,
                self::SHOW_DATA => isset($includeRelationships['checkpoints']),
                self::DATA => function () use ($resource) {
                    return $resource->checkpoints;
                }
            ],
            'designs' => [
                self::SHOW_SELF => true,
                self::SHOW_RELATED => true,
            ],
        ];
    }

    public function getIncludePaths() {
        return ['checkpoints', 'forms'];
    }
}

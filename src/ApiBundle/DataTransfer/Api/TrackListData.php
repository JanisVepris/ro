<?php
namespace ApiBundle\DataTransfer\Api;

use JMS\Serializer\Annotation as Serializer;

class TrackListData
{
    /**
     * @var TrackListItemData[]
     * @Serializer\Type("array<ApiBundle\DataTransfer\Api\TrackListItemData>")
     * @Serializer\Inline()
     */
    private $items;

    /**
     * @var MetaData
     * @Serializer\Type("ApiBundle\DataTransfer\Api\MetaData")
     */
    private $metadata;

    /**
     * @param TrackListItemData[] $tracks
     * @param MetaData $metadata
     */
    private function __construct(array $items, MetaData $metadata)
    {
        $this->items = $items;
        $this->metadata = $metadata;
    }

    /**
     * @param TrackListItemData[] $tracks
     * @param MetaData $metadata
     * @return static
     */
    public static function create(array $tracks, MetaData $metadata)
    {
        return new static($tracks, $metadata);
    }
}

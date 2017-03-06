<?php
namespace ApiBundle\DataTransfer\Api;

use JMS\Serializer\Annotation as Serializer;

class VideoListData
{
    /**
     * @var VideoListItemData[]
     * @Serializer\Type("array<ApiBundle\DataTransfer\Api\VideoListItemData>")
     */
    private $items;

    /**
     * @var MetaData
     * @Serializer\Type("ApiBundle\DataTransfer\Api\MetaData")
     */
    private $metadata;

    /**
     * @param VideoListItemData[] $videos
     * @param MetaData $metadata
     */
    private function __construct(array $videos, MetaData $metadata)
    {
        $this->items = $videos;
        $this->metadata = $metadata;
    }

    /**
     * @param VideoListItemData[] $videos
     * @param MetaData $metadata
     * @return VideoListData
     */
    public static function create(array $videos, MetaData $metadata)
    {
        return new static($videos, $metadata);
    }
}

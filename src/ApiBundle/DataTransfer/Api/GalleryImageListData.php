<?php
namespace ApiBundle\DataTransfer\Api;

use JMS\Serializer\Annotation as Serializer;

class GalleryImageListData
{
    /**
     * @var GalleryImageData[]
     * @Serializer\Type("array<ApiBundle\DataTransfer\Api\GalleryImageData>")
     */
    private $items;

    /**
     * @var MetaData
     * @Serializer\Type("ApiBundle\DataTransfer\Api\MetaData")
     */
    private $metadata;

    /**
     * @param GalleryImageData[] $items
     */
    private function __construct(array $items, MetaData $metadata)
    {
        $this->items = $items;
        $this->metadata = $metadata;
    }

    /**
     * @param GalleryImageData[] $items
     * @return static
     */
    public static function create(array $items, MetaData $metadata)
    {
        return new static($items, $metadata);
    }
}

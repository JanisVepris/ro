<?php
namespace ApiBundle\DataTransfer\Api;

use JMS\Serializer\Annotation as Serializer;

class GalleryImageListData
{
    /**
     * @var UrlItemData[]
     * @Serializer\Type("array<ApiBundle\DataTransfer\Api\UrlItemData>")
     */
    private $items;

    /**
     * @var MetaData
     * @Serializer\Type("ApiBundle\DataTransfer\Api\MetaData")
     */
    private $metadata;

    /**
     * @param UrlItemData[] $items
     */
    private function __construct(array $items, MetaData $metadata)
    {
        $this->items = $items;
        $this->metadata = $metadata;
    }

    /**
     * @param UrlItemData[] $items
     * @return static
     */
    public static function create(array $items, MetaData $metadata)
    {
        return new static($items, $metadata);
    }
}

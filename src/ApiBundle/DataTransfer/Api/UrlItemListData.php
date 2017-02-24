<?php
namespace ApiBundle\DataTransfer\Api;

use JMS\Serializer\Annotation as Serializer;

class UrlItemListData
{
    /**
     * @var UrlItemData[]
     * @Serializer\Type("array<ApiBundle\DataTransfer\Api\UrlItemData>")
     * @Serializer\Inline()
     */
    private $items;

    /**
     * @param UrlItemData[] $items
     */
    private function __construct(array $items)
    {
        $this->items = $items;
    }

    /**
     * @param UrlItemData[] $items
     * @return static
     */
    public static function create(array $items)
    {
        return new static($items);
    }
}

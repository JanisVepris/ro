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
     * @param TrackListItemData[] $tracks
     */
    private function __construct($items)
    {
        $this->items = $items;
    }

    /**
     * @param TrackListItemData[] $tracks
     * @return static
     */
    public static function create(array $tracks)
    {
        return new static($tracks);
    }
}

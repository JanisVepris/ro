<?php
namespace ApiBundle\DataTransfer\Api;

use Functional as F;
use JMS\Serializer\Annotation as Serializer;

class LyricsListData
{
    /**
     * @var LyricsListItemData[]
     * @Serializer\Type("array<ApiBundle\DataTransfer\Api\LyricsListItemData>")
     * @Serializer\Inline()
     */
    private $items;

    private function __construct($items)
    {
        $this->items = $items;
    }

    public static function create($lyricItems)
    {
        $lyricItems = F\map($lyricItems, [LyricsListItemData::class, 'createFromEntity']);

        return new static($lyricItems);
    }
}

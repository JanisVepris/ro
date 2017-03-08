<?php
namespace ApiBundle\DataTransfer\Api;

use Functional as F;
use JMS\Serializer\Annotation as Serializer;

class LyricsListData
{
    /**
     * @var LyricsListItemData[]
     * @Serializer\Type("array<ApiBundle\DataTransfer\Api\LyricsListItemData>")
     */
    private $items;

    /**
     * @var MetaData
     * @Serializer\Type("ApiBundle\DataTransfer\Api\MetaData")
     */
    private $metadata;

    private function __construct($items, MetaData $metadata)
    {
        $this->items = $items;
        $this->metadata = $metadata;
    }

    public static function create($lyricItems, MetaData $metadata)
    {
        $lyricItems = F\map($lyricItems, [LyricsListItemData::class, 'createFromEntity']);

        return new static($lyricItems, $metadata);
    }
}

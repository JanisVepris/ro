<?php
namespace ApiBundle\DataTransfer\Api;

use JMS\Serializer\Annotation as Serializer;

class VideoListData
{
    /**
     * @var VideoListItemData[]
     * @Serializer\Type("array<ApiBundle\DataTransfer\Api\VideoListItemData>")
     * @Serializer\Inline()
     */
    private $videos;

    /**
     * @param VideoListItemData[] $videos
     */
    public function __construct(array $videos)
    {
        $this->videos = $videos;
    }
}

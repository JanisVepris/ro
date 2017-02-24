<?php
namespace ApiBundle\DataTransfer\Api;

use JMS\Serializer\Annotation as Serializer;
use RoBundle\Entity\Video;

class VideoListItemData
{
    /**
     * @var string
     * @Serializer\Type("string")
     */
    private $title;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    private $url;

    private function __construct($title, $url)
    {
        $this->title = $title;
        $this->url = $url;
    }

    /**
     * @param Video $video
     * @return static
     */
    public static function createFromEntity(Video $video)
    {
        return new static($video->getTitle(), $video->getUrl());
    }
}

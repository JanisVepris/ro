<?php
namespace ApiBundle\DataTransfer\Api;

use JMS\Serializer\Annotation as Serializer;

class TrackListItemData
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

    /**
     * @param string $title
     * @param string $url
     */
    private function __construct($title, $url)
    {
        $this->title = $title;
        $this->url = $url;
    }

    /**
     * @param string $title
     * @param string $url
     * @return static
     */
    public static function create($title, $url)
    {
        return new static($title, $url);
    }
}

<?php
namespace ApiBundle\DataTransfer\Api;

use JMS\Serializer\Annotation as Serializer;

class GalleryImageData
{
    /**
     * @var string
     * @Serializer\Type("string")
     */
    private $url;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    private $urlMobile;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    private $thumbnail;

    /**
     * @param string $url
     * @param string $urlMobile
     * @param string $thumbnail
     */
    private function __construct($url, $urlMobile, $thumbnail)
    {
        $this->url = $url;
        $this->urlMobile = $urlMobile;
        $this->thumbnail = $thumbnail;
    }

    /**
     * @param string $url
     * @param string $urlMobile
     * @param string $thumbnail
     * @return GalleryImageData
     */
    public static function create($url, $urlMobile, $thumbnail)
    {
        return new static($url, $urlMobile, $thumbnail);
    }
}

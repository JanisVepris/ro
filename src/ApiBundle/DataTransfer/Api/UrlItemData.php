<?php
namespace ApiBundle\DataTransfer\Api;

use JMS\Serializer\Annotation as Serializer;

class UrlItemData
{
    /**
     * @var string
     * @Serializer\Type("string")
     */
    private $url;

    /**
     * @param string $url
     */
    private function __construct($url)
    {
        $this->url = $url;
    }

    public static function create($url)
    {
        return new static($url);
    }
}

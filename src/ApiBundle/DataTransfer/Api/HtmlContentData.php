<?php

namespace ApiBundle\DataTransfer\Api;

use JMS\Serializer\Annotation as Serializer;

class HtmlContentData
{
    /**
     * @var string
     * @Serializer\Type("string")
     */
    private $content;

    /**
     * @param string $content
     */
    private function __construct($content)
    {
        $this->content = $content;
    }

    public static function create($content)
    {
        return new static($content);
    }
}

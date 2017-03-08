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
     * @var MetaData
     * @Serializer\Type("ApiBundle\DataTransfer\Api\MetaData")
     */
    private $metadata;

    private function __construct($content, MetaData $metadata)
    {
        $this->content = $content;
        $this->metadata = $metadata;
    }

    public static function create($content, MetaData $metadata)
    {
        return new static($content, $metadata);
    }
}

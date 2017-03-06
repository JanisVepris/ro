<?php
namespace ApiBundle\DataTransfer\Api;

use JMS\Serializer\Annotation as Serializer;

class PosterData
{
    /**
     * @var UrlItemData
     * @Serializer\Type("ApiBundle\DataTransfer\Api\UrlItemData")
     * @Serializer\Inline()
     */
    private $urlItemData;

    /**
     * @var MetaData
     * @Serializer\Type("ApiBundle\DataTransfer\Api\MetaData")
     */
    private $metadata;

    /**
     * @param UrlItemData $urlItemData
     * @param MetaData $metadata
     */
    private function __construct(UrlItemData $urlItemData, MetaData $metadata)
    {
        $this->urlItemData = $urlItemData;
        $this->metadata = $metadata;
    }

    /**
     * @param UrlItemData $urlItemData
     * @param MetaData $metaData
     * @return PosterData
     */
    public static function create(UrlItemData $urlItemData, MetaData $metaData)
    {
        return new static($urlItemData, $metaData);
    }
}

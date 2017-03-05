<?php

namespace ApiBundle\DataTransfer\Api;

use JMS\Serializer\Annotation as Serializer;

class ArticleData
{
    /**
     * @var integer
     * @Serializer\Type("integer")
     */
    private $id;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    private $slug;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    private $title;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    private $description;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    private $content;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    private $image;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    private $thumbBig;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    private $thumbSmall;

    /**
     * @var \DateTime
     * @Serializer\Type("DateTime<'Y.m.d H:i'>")
     */
    private $createdOn;

    /**
     * @var MetaData
     * @Serializer\Type("ApiBundle\DataTransfer\Api\MetaData")
     */
    private $metadata;

    /**
     * @param integer $id
     * @param string $slug
     * @param string $title
     * @param string $description
     * @param string $content
     * @param string $image
     * @param string $thumbBig
     * @param string $thumbSmall
     * @param \DateTime $createdOn
     * @param MetaData $metadata
     */
    public function __construct(
        $id,
        $slug,
        $title,
        $description,
        $content,
        $image,
        $thumbBig,
        $thumbSmall,
        $createdOn,
        MetaData $metadata
    ) {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->content = $content;
        $this->image = $image;
        $this->createdOn = $createdOn;
        $this->slug = $slug;
        $this->thumbBig = $thumbBig;
        $this->thumbSmall = $thumbSmall;
        $this->metadata = $metadata;
    }
}

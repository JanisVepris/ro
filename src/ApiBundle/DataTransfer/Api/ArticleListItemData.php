<?php

namespace ApiBundle\DataTransfer\Api;

use RoBundle\Entity\Article;
use JMS\Serializer\Annotation as Serializer;

class ArticleListItemData
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
     * @param integer $id
     * @param string $slug
     * @param string $title
     * @param string $description
     * @param string $thumbBig
     * @param string $thumbSmall
     * @param \DateTime $createdOn
     */
    private function __construct($id, $slug, $title, $description, $thumbBig, $thumbSmall, \DateTime $createdOn)
    {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->createdOn = $createdOn;
        $this->slug = $slug;
        $this->thumbBig = $thumbBig;
        $this->thumbSmall = $thumbSmall;
    }

    /**
     * @param integer $id
     * @param string $slug
     * @param string $title
     * @param string $description
     * @param string $thumbBig
     * @param string $thumbSmall
     * @param \DateTime $createdOn
     * @return static
     */
    public static function create(
        $id,
        $slug,
        $title,
        $description,
        $thumbBig,
        $thumbSmall,
        \DateTime $createdOn
    ) {
        return new static(
            $id,
            $slug,
            $title,
            $description,
            $thumbBig,
            $thumbSmall,
            $createdOn
        );
    }
}

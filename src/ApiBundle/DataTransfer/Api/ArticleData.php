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
     * @var \DateTime
     * @Serializer\Type("DateTime<'Y.m.d H:i'>")
     */
    private $createdOn;

    /**
     * @param int $id
     * @param string $title
     * @param string $description
     * @param string $content
     * @param string $image
     * @param string $createdOn
     */
    public function __construct($id, $title, $description, $content, $image, $createdOn)
    {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->content = $content;
        $this->image = $image;
        $this->createdOn = $createdOn;
    }
}

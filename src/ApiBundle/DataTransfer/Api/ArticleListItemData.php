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
    private $title;
    
    /**
     * @var string
     * @Serializer\Type("string")
     */
    private $description;
    
    /**
     * @var \DateTime
     * @Serializer\Type("DateTime<'Y.m.d H:i'>")
     */
    private $createdOn;

    /**
     * @param int $id
     * @param string $title
     * @param string $description
     * @param \DateTime $createdOn
     */
    private function __construct($id, $title, $description, \DateTime $createdOn)
    {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->createdOn = $createdOn;
    }

    public static function createFromEntity(Article $article)
    {
        return new static(
            $article->getId(),
            $article->getTitle(),
            $article->getDescription(),
            $article->getCreatedOn()
        );
    }
}

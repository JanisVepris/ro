<?php
namespace ApiBundle\DataTransfer\Api;

use JMS\Serializer\Annotation as Serializer;
use RoBundle\Entity\Article;
use Functional as F;

class ArticleListData
{
    /**
     * @var integer
     * @Serializer\Type("integer")
     */
    private $total;

    /**
     * @var integer
     * @Serializer\Type("integer")
     */
    private $limit;

    /**
     * @var integer
     * @Serializer\Type("integer")
     */
    private $offset;

    /**
     * @var ArticleListItemData[]
     * @Serializer\Type("array<ApiBundle\DataTransfer\Api\ArticleListItemData>")
     */
    private $articles;

    /**
     * @param int $total
     * @param int $limit
     * @param int $offset
     * @param ArticleListItemData[] $articles
     */
    private function __construct($total, $limit, $offset, array $articles)
    {
        $this->total = $total;
        $this->limit = $limit;
        $this->offset = $offset;
        $this->articles = $articles;
    }

    /**
     * @param int $total
     * @param int $limit
     * @param int $offset
     * @param Article[] $articles
     * @return static
     */
    public static function create($total, $limit, $offset, array $articles)
    {
        return new static($total, $limit, $offset, $articles);
    }
}

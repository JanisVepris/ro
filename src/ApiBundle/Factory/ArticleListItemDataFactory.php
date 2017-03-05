<?php

namespace ApiBundle\Factory;

use ApiBundle\DataTransfer\Api\ArticleListItemData;
use CoreBundle\Service\ImageResizer;
use RoBundle\Entity\Article;

class ArticleListItemDataFactory
{
    /** @var ImageResizer */
    private $imageResizer;

    public function __construct(ImageResizer $imageResizer)
    {
        $this->imageResizer = $imageResizer;
    }

    public function createFromEntity(Article $article)
    {
        return ArticleListItemData::create(
            $article->getId(),
            $article->getSlug(),
            $article->getTitle(),
            $article->getDescription(),
            $this->imageResizer->getBigArticleThumbnail($article->getArticleImage()->getWebPath()),
            $this->imageResizer->getSmallArticleThumbnail($article->getArticleImage()->getWebPath()),
            $article->getCreatedOn()
        );
    }
}

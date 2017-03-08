<?php
namespace ApiBundle\Factory;

use ApiBundle\DataTransfer\Api\ArticleListItemData;
use RoBundle\Entity\Article;

class ArticleListItemDataFactory extends AbstractApiDataFactory
{
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

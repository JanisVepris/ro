<?php

namespace ApiBundle\Factory;

use ApiBundle\DataTransfer\Api\ArticleData;
use CoreBundle\Service\AbsoluteUrlGenerator;
use CoreBundle\Service\ImageResizer;
use RoBundle\Entity\Article;

class ArticleDataFactory extends AbstractApiDataFactory
{
    public function createFromEntity(Article $article)
    {
        if ($article->getArticleImage()) {
            $imageUrl = $article->getArticleImage()->getWebPath();
        } else {
            $imageUrl = $article->getEvent()->getEventImage()->getWebPath();
        }

        return new ArticleData(
            $article->getId(),
            $article->getSlug(),
            $article->getTitle(),
            $article->getDescription(),
            $article->getContent(),
            $this->absoluteUrlGenerator->generateAbsoluteUrlFromRelative($imageUrl),
            $this->imageResizer->getBigArticleThumbnail($article->getArticleImage()->getWebPath()),
            $this->imageResizer->getSmallArticleThumbnail($article->getArticleImage()->getWebPath()),
            $article->getCreatedOn(),
            $this->metaDataFactory->createFromArticle($article)
        );
    }
}

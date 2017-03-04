<?php
namespace ApiBundle\Factory;

use ApiBundle\DataTransfer\Api\ArticleData;
use CoreBundle\Service\AbsoluteUrlGenerator;
use RoBundle\Entity\Article;

class ArticleDataFactory
{
    /** @var AbsoluteUrlGenerator */
    private $absoluteUrlGenerator;

    public function __construct(AbsoluteUrlGenerator $absoluteUrlGenerator)
    {
        $this->absoluteUrlGenerator = $absoluteUrlGenerator;
    }

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
            $article->getCreatedOn()
        );
    }
}

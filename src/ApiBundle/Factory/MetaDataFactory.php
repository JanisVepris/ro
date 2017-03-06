<?php
namespace ApiBundle\Factory;

use ApiBundle\DataTransfer\Api\MetaData;
use CoreBundle\Service\ImageResizer;
use RoBundle\Entity\Article;
use RoBundle\Entity\Event;

class MetaDataFactory
{
    const OG_TYPE_ARTICLE = 'article';
    const OG_SITE_NAME = 'MIDI Roko Operos';

    /** @var ImageResizer */
    private $imageResizer;

    public function __construct(ImageResizer $imageResizer)
    {
        $this->imageResizer = $imageResizer;
    }

    /**
     * @param Article $article
     * @return MetaData
     */
    public function createFromArticle(Article $article)
    {
        return MetaData::create(
            $article->getTitle(),
            $article->getDescription(),
            static::OG_TYPE_ARTICLE,
            static::OG_SITE_NAME,
            $this->imageResizer->getFacebookPreviewImage($article->getArticleImage()->getWebPath()),
            $article->getArticleImage()->getMimeType(),
            $article->getDescription()
        );
    }

    public function createFromEvent(Event $event)
    {
        return MetaData::create(
            $event->getTitle(),
            $event->getDescription(),
            static::OG_TYPE_ARTICLE,
            static::OG_SITE_NAME,
            $this->imageResizer->getFacebookPreviewImage($event->getEventImage()->getWebPath()),
            $event->getEventImage()->getMimeType(),
            $event->getDescription()
        );
    }

    public function createPosterMetadataFromEvent(Event $event)
    {
        return MetaData::create(
            sprintf('%s "%s" Plakatas', static::OG_SITE_NAME, $event->getTitle()),
            $event->getDescription(),
            static::OG_TYPE_ARTICLE,
            static::OG_SITE_NAME,
            $this->imageResizer->getFacebookPreviewImage($event->getPoster()->getWebPath()),
            $event->getPoster()->getMimeType(),
            $event->getDescription()
        );
    }

    public function createPlaylistMetadataFromEvent(Event $event)
    {
        return MetaData::create(
            sprintf('%s "%s" Grojaraštis', static::OG_SITE_NAME, $event->getTitle()),
            $event->getDescription(),
            static::OG_TYPE_ARTICLE,
            static::OG_SITE_NAME,
            $this->imageResizer->getFacebookPreviewImage($event->getEventImage()->getWebPath()),
            $event->getEventImage()->getMimeType(),
            $event->getDescription()
        );
    }
}

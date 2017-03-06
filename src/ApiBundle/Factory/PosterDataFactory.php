<?php
namespace ApiBundle\Factory;

use ApiBundle\DataTransfer\Api\PosterData;
use ApiBundle\DataTransfer\Api\UrlItemData;
use RoBundle\Entity\Event;

class PosterDataFactory extends AbstractApiDataFactory
{
    public function createFromEvent(Event $event)
    {
        $url = $this->absoluteUrlGenerator->generateAbsoluteUrlFromRelative($event->getPoster()->getWebPath());

        return PosterData::create(
            UrlItemData::create($url),
            $this->metaDataFactory->createPosterMetadataFromEvent($event)
        );
    }
}

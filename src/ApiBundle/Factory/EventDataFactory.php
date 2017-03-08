<?php
namespace ApiBundle\Factory;

use ApiBundle\DataTransfer\Api\EventData;
use RoBundle\Entity\Event;

class EventDataFactory extends AbstractApiDataFactory
{
    public function createFromEntity(Event $event)
    {
        return new EventData(
            $event->getId(),
            $event->getTitle(),
            $event->getEventDate(),
            $this->absoluteUrlGenerator->generateAbsoluteUrlFromRelative($event->getEventImage()->getWebPath()),
            $event->getSlug(),
            $event->hasLyrics(),
            $event->hasFacts(),
            $event->hasPoster(),
            $event->hasTeam(),
            $event->hasScript(),
            $event->hasGallery(),
            $event->hasVideoPlaylist(),
            $event->hasAudioPlaylist(),
            $event->isDisabled(),
            $this->metaDataFactory->createFromEvent($event)
        );
    }
}

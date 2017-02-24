<?php
namespace ApiBundle\Factory;

use ApiBundle\DataTransfer\Api\EventData;
use CoreBundle\Service\AbsoluteUrlGenerator;
use RoBundle\Entity\Event;

class EventDataFactory
{
    /** @var AbsoluteUrlGenerator */
    private $absoluteUrlGenerator;

    public function __construct(AbsoluteUrlGenerator $absoluteUrlGenerator)
    {
        $this->absoluteUrlGenerator = $absoluteUrlGenerator;
    }

    public function createFromEntity(Event $event)
    {
        return new EventData(
            $event->getId(),
            $event->getTitle(),
            $event->getPlaylist() ? $event->getPlaylist()->getId() : null,
            $event->getEventDate(),
            $this->absoluteUrlGenerator->generateAbsoluteUrlFromRelative($event->getEventImage()->getWebPath()),
            $event->getSlug(),
            $event->hasLyrics(),
            $event->hasFacts(),
            $event->hasPoster(),
            $event->hasTeam(),
            $event->hasScript(),
            $event->hasGallery(),
            $event->hasVideoPlaylist()
        );
    }
}

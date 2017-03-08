<?php
namespace ApiBundle\Factory;

use ApiBundle\DataTransfer\Api\LyricsListData;
use RoBundle\Entity\Event;

class LyricsListDataFactory extends AbstractApiDataFactory
{
    public function createFromEvent(Event $event)
    {
        return LyricsListData::create(
            $event->getLyrics()->getLyricList()->toArray(),
            $this->metaDataFactory->createLyricsMetaDataFromEvent($event)
        );
    }
}

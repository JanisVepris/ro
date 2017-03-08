<?php
namespace ApiBundle\Factory;

use ApiBundle\DataTransfer\Api\HtmlContentData;
use RoBundle\Entity\Event;

class FactsDataFactory extends AbstractApiDataFactory
{
    public function createFromEvent(Event $event)
    {
        return HtmlContentData::create(
            $event->getFacts()->getContent(),
            $this->metaDataFactory->createFactsMetaDataFromEvent($event)
        );
    }
}

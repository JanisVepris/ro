<?php
namespace ApiBundle\Factory;

use ApiBundle\DataTransfer\Api\HtmlContentData;
use RoBundle\Entity\Event;

class ScriptDataFactory extends AbstractApiDataFactory
{
    public function createFromEvent(Event $event)
    {
        return HtmlContentData::create(
            $event->getScript()->getContent(),
            $this->metaDataFactory->createScriptMetaDataFromEvent($event)
        );
    }
}

<?php
namespace ApiBundle\Factory;

use ApiBundle\DataTransfer\Api\HtmlContentData;
use RoBundle\Entity\Event;

class TeamDataFactory extends AbstractApiDataFactory
{
    public function createFromEvent(Event $event)
    {
        return HtmlContentData::create(
            $event->getTeam()->getContent(),
            $this->metaDataFactory->createTeamMetaDataFromEvent($event)
        );
    }
}

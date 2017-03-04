<?php

namespace RoBundle\Service;

use Doctrine\ORM\EntityManager;
use RoBundle\Entity\Event;
use RoBundle\Entity\Facts;

class FactsService
{
    /** @var EntityManager */
    private $em;

    /**
     * @param EntityManager $em
     */
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function saveFacts(Event $event, Facts $facts)
    {
        $event->setFacts($facts);
        $this->em->persist($event);
        $this->em->flush();
    }
}

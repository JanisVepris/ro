<?php

namespace RoBundle\Service;

use Doctrine\ORM\EntityManager;
use RoBundle\Entity\Event;
use RoBundle\Entity\Script;

class ScriptService
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

    public function saveScript(Event $event, Script $script)
    {
        $event->setScript($script);
        $this->em->persist($event);
        $this->em->flush($event);
    }
}

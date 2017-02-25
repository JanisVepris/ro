<?php

namespace RoBundle\Service;

use Doctrine\ORM\EntityManager;
use RoBundle\Entity\Event;
use RoBundle\Entity\Team;

class TeamService
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

    public function saveTeam(Event $event, Team $team)
    {
        $event->setTeam($team);
        $this->em->persist($event);
        $this->em->flush();
    }
}

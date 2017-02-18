<?php
namespace AdminBundle\Service;

use Doctrine\ORM\EntityManager;
use RoBundle\Entity\Event;
use RoBundle\Repository\EventRepository;

class EventService
{
    /** @var EventRepository */
    private $eventRepository;

    /** @var EntityManager */
    private $em;

    /**
     * @param EventRepository $eventRepository
     * @param EntityManager $em
     */
    public function __construct(EventRepository $eventRepository, EntityManager $em)
    {
        $this->eventRepository = $eventRepository;
        $this->em = $em;
    }

    /** @return Event[] */
    public function getAllEvents()
    {
        return $this->eventRepository->findAll();
    }

    public function saveEvent(Event $event)
    {
        $this->em->persist($event);
        $this->em->flush($event);
    }

    public function deleteEvent(Event $event)
    {
        $this->em->remove($event);
        $this->em->flush();
    }
}

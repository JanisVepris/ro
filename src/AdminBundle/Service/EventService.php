<?php
namespace AdminBundle\Service;

use RoBundle\Entity\Event;
use RoBundle\Repository\EventRepository;

class EventService
{
    /** @var EventRepository */
    private $eventRepository;

    /** @param EventRepository $eventRepository */
    public function __construct(EventRepository $eventRepository)
    {
        $this->eventRepository = $eventRepository;
    }

    /** @return Event[] */
    public function getAllEvents()
    {
        return $this->eventRepository->findAll();
    }
}

<?php
namespace AdminBundle\Service;

use RoBundle\Repository\EventRepository;

class EventService
{
    /** @var EventRepository */
    private $eventRepository;

    /**
     * @param EventRepository $eventRepository
     */
    public function __construct(EventRepository $eventRepository)
    {
        $this->eventRepository = $eventRepository;
    }

    public function getAllEvents()
    {
        return $this->eventRepository->findAll();
    }
}

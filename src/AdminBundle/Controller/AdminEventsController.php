<?php
namespace AdminBundle\Controller;

use AdminBundle\Service\EventService;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * @Route("/events", service="admin.controller.event_controller")
 */
class AdminEventsController extends Controller
{
    /** @var EventService */
    private $eventService;

    public function __construct(EventService $eventService)
    {
        $this->eventService = $eventService;
    }

    /**
     * @Route("/list", name="admin_events_list")
     * @Template
     */
    public function listAction()
    {
        $events = $this->eventService->getAllEvents();

        return [
            'events' => $events,
        ];
    }

    /**
     * @Route("/create", name="admin_events_create")
     * @Template
     */
    public function createAction()
    {
        return [];
    }
}

<?php
namespace ApiBundle\Controller\Api;

use ApiBundle\Controller\AbstractApiController;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use FOS\RestBundle\Controller\Annotations as Rest;
use RoBundle\Service\EventService;

/** @Rest\Route(service="api.controller.events_controller") */
class EventsController extends AbstractApiController
{
    /** @var EventService */
    private $eventService;

    public function __construct(EventService $eventService)
    {
        $this->eventService = $eventService;
    }

    /**
     * @ApiDoc(
     *     description="Get event list",
     *     section="Event",
     *     tags={"TODO"}
     * )
     * @Rest\Get(
     *     path="/api/events",
     *     name="ro_api_events_index"
     * )
     * @Rest\View
     */
    public function indexAction()
    {
        $events = $this->eventService->getAllEvents();
        var_dump(count($events));die;
        return $this->createView([]);
    }

    /**
     * @ApiDoc(
     *     description="Get event by ID",
     *     section="Event",
     *     tags={"TODO"}
     * )
     * @Rest\Get(
     *     path="/api/events/{eventId}",
     *     name="ro_api_events_get"
     * )
     * @Rest\View
     */
    public function getAction()
    {
        return $this->createView([]);
    }
}

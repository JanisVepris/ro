<?php
namespace ApiBundle\Controller\Api;

use ApiBundle\Controller\AbstractApiController;
use ApiBundle\DataTransfer\Api\EventListItemData;
use ApiBundle\Factory\EventDataFactory;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use FOS\RestBundle\Controller\Annotations as Rest;
use RoBundle\Entity\Event;
use RoBundle\Service\EventService;
use Functional as F;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/** @Rest\Route(service="api.controller.events_controller") */
class EventsController extends AbstractApiController
{
    /** @var EventService */
    private $eventService;

    /** @var EventDataFactory */
    private $eventDataFactory;

    /**
     * @param EventService $eventService
     * @param EventDataFactory $eventDataFactory
     */
    public function __construct(EventService $eventService, EventDataFactory $eventDataFactory)
    {
        $this->eventService = $eventService;
        $this->eventDataFactory = $eventDataFactory;
    }

    /**
     * @ApiDoc(
     *     description="Get event list",
     *     section="Event",
     *     output="ApiBundle\DataTransfer\Api\EventListItemData"
     * )
     * @Rest\Get(
     *     path="/events",
     *     name="ro_api_events_index"
     * )
     * @Rest\View
     */
    public function indexAction()
    {
        $events = $this->eventService->getAllEvents();

        $events = F\map($events, function ($event) {
            return EventListItemData::createFromEntity($event);
        });

        return $this->createView($events);
    }

    /**
     * @ApiDoc(
     *     description="Get event by ID",
     *     section="Event",
     *     output="ApiBundle\DataTransfer\Api\EventData"
     * )
     * @Rest\Get(
     *     path="/events/{eventId}",
     *     name="ro_api_events_get"
     * )
     * @ParamConverter("event", options={"id" = "eventId"})
     * @Rest\View
     */
    public function getAction(Event $event)
    {
        if ($event->isDisabled()) {
            throw new NotFoundHttpException();
        }

        return $this->createView(
            $this->eventDataFactory->createFromEntity($event)
        );
    }
}

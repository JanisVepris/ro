<?php
namespace ApiBundle\Controller\Api;

use ApiBundle\Controller\AbstractApiController;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use FOS\RestBundle\Controller\Annotations as Rest;


class EventsController extends AbstractApiController
{
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

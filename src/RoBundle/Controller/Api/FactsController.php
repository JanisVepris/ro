<?php
namespace RoBundle\Controller\Api;

use ApiBundle\Controller\AbstractApiController;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use FOS\RestBundle\Controller\Annotations as Rest;

class FactsController extends AbstractApiController
{
    /**
     * @ApiDoc(
     *     description="Get facts page content by event id.",
     *     section="Facts",
     *     tags={"TODO"}
     * )
     * @Rest\Get(
     *     path="/api/events/{eventId}/facts",
     *     name="ro_api_fact_get"
     * )
     * @Rest\View
     */
    public function getAction()
    {
        return $this->createView([]);
    }
}

<?php
namespace RoBundle\Controller\Api;

use ApiBundle\Controller\AbstractApiController;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use FOS\RestBundle\Controller\Annotations as Rest;

class TeamsController extends AbstractApiController
{
    /**
     * @ApiDoc(
     *     description="Get team page content by event id.",
     *     section="Team",
     *     tags={"TODO"}
     * )
     * @Rest\Get(
     *     path="/api/events/{eventId}/team",
     *     name="ro_api_teams_get"
     * )
     * @Rest\View
     */
    public function getAction()
    {
        return $this->createView([]);
    }
}

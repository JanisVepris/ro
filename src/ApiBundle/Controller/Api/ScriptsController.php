<?php
namespace ApiBundle\Controller\Api;

use ApiBundle\Controller\AbstractApiController;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use FOS\RestBundle\Controller\Annotations as Rest;

class ScriptsController extends AbstractApiController
{
    /**
     * @ApiDoc(
     *     description="Get script page content by event id.",
     *     section="Script",
     *     tags={"TODO"}
     * )
     * @Rest\Get(
     *     path="/api/events/{eventId}/script",
     *     name="ro_api_scripts_get"
     * )
     * @Rest\View
     */
    public function getAction()
    {
        return $this->createView([]);
    }
}

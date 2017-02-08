<?php
namespace RoBundle\Controller\Api;

use ApiBundle\Controller\AbstractApiController;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use FOS\RestBundle\Controller\Annotations as Rest;

class PostersController extends AbstractApiController
{
    /**
     * @ApiDoc(
     *     description="Get event poster by id",
     *     section="Poster",
     *     tags={"TODO"}
     * )
     * @Rest\Get(
     *     path="/api/events/{eventId}/poster",
     *     name="ro_api_posters_get"
     * )
     * @Rest\View
     */
    public function getAction()
    {
        return $this->createView([]);
    }
}

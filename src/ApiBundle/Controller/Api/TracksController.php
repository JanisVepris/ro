<?php
namespace ApiBundle\Controller\Api;

use ApiBundle\Controller\AbstractApiController;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use FOS\RestBundle\Controller\Annotations as Rest;

/** @Rest\Route(service="api.controller.tracks_controller") */
class TracksController extends AbstractApiController
{
    /**
     * @ApiDoc(
     *     description="Get audio track list by playlist id",
     *     section="Audio",
     *     tags={"TODO"}
     * )
     * @Rest\Get(
     *     path="/api/events/{eventId}/audioPlaylist/{playlistId}/tracks",
     *     name="ro_api_tracks_index"
     * )
     * @Rest\View
     */
    public function indexAction()
    {
        return $this->createView([]);
    }
}

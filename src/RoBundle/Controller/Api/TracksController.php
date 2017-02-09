<?php
namespace RoBundle\Controller\Api;

use ApiBundle\Controller\AbstractApiController;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use FOS\RestBundle\Controller\Annotations as Rest;

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

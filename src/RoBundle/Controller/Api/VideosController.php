<?php
namespace RoBundle\Controller\Api;

use ApiBundle\Controller\AbstractApiController;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use FOS\RestBundle\Controller\Annotations as Rest;

class VideosController extends AbstractApiController
{
    /**
     * @ApiDoc(
     *     description="Get video list by playlist id",
     *     section="Video",
     *     tags={"TODO"}
     * )
     * @Rest\Get(
     *     path="/api/events/{eventId}/videoPlaylist/{playlistId}/videos",
     *     name="ro_api_videos_index"
     * )
     * @Rest\View
     */
    public function indexAction()
    {
        return $this->createView([]);
    }
}

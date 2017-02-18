<?php
namespace ApiBundle\Controller\Api;

use ApiBundle\Controller\AbstractApiController;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use FOS\RestBundle\Controller\Annotations as Rest;

class LyricsController extends AbstractApiController
{
    /**
     * @ApiDoc(
     *     description="Get LyricItem list by event id.",
     *     section="Lyrics",
     *     tags={"TODO"}
     * )
     * @Rest\Get(
     *     path="/api/events/{eventId}/lyrics",
     *     name="ro_api_lyrics_index"
     * )
     * @Rest\View
     */
    public function indexAction()
    {
        return $this->createView([]);
    }

    /**
     * @ApiDoc(
     *     description="Get LyricItem by id.",
     *     section="Lyrics",
     *     tags={"TODO"}
     * )
     * @Rest\Get(
     *     path="/api/events/{eventId}/lyrics/{lyricId}",
     *     name="ro_api_lyrics_get"
     * )
     * @Rest\View
     */
    public function getAction()
    {
        return $this->createView([]);
    }
}

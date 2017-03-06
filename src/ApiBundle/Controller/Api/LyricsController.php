<?php
namespace ApiBundle\Controller\Api;

use ApiBundle\Controller\AbstractApiController;
use ApiBundle\DataTransfer\Api\LyricData;
use ApiBundle\DataTransfer\Api\LyricsListData;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use FOS\RestBundle\Controller\Annotations as Rest;
use RoBundle\Entity\Event;
use RoBundle\Entity\Lyric;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

/** @Rest\Route(service="api.controller.lyrics_controller") */
class LyricsController extends AbstractApiController
{
    /**
     * @ApiDoc(
     *     description="Get LyricItem list by event id.",
     *     section="Lyrics",
     *     output="ApiBundle\DataTransfer\Api\LyricsListData"
     * )
     * @Rest\Get(
     *     path="/api/events/{eventId}/lyrics",
     *     name="ro_api_lyrics_index"
     * )
     * @ParamConverter("event", options={"id" = "eventId"})
     * @Rest\View
     */
    public function indexAction(Event $event)
    {
        // TODO: add metadata
        return $this->createView(
            LyricsListData::create($event->getLyrics()->getLyricList()->toArray())
        );
    }

    /**
     * @ApiDoc(
     *     description="Get LyricItem by id.",
     *     section="Lyrics",
     *     output="ApiBundle\DataTransfer\Api\LyricData"
     * )
     * @Rest\Get(
     *     path="/api/events/{eventId}/lyrics/{lyricId}",
     *     name="ro_api_lyrics_get"
     * )
     * @ParamConverter("event", options={"id" = "eventId"})
     * @ParamConverter("lyric", options={"id" = "lyricId"})
     * @Rest\View
     */
    public function getAction(Event $event, Lyric $lyric)
    {
        return $this->createView(
            LyricData::createFromEntity($lyric)
        );
    }
}

<?php
namespace ApiBundle\Controller\Api;

use ApiBundle\Controller\AbstractApiController;
use ApiBundle\DataTransfer\Api\LyricData;
use ApiBundle\Factory\LyricsListDataFactory;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use FOS\RestBundle\Controller\Annotations as Rest;
use RoBundle\Entity\Event;
use RoBundle\Entity\Lyric;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/** @Rest\Route(service="api.controller.lyrics_controller") */
class LyricsController extends AbstractApiController
{
    /** @var LyricsListDataFactory */
    private $lyricsListDataFactory;

    public function __construct(LyricsListDataFactory $lyricsListDataFactory)
    {
        $this->lyricsListDataFactory = $lyricsListDataFactory;
    }

    /**
     * @ApiDoc(
     *     description="Get LyricItem list by event id.",
     *     section="Lyrics",
     *     output="ApiBundle\DataTransfer\Api\LyricsListData"
     * )
     * @Rest\Get(
     *     path="/events/{eventId}/lyrics",
     *     name="ro_api_lyrics_index"
     * )
     * @ParamConverter("event", options={"id" = "eventId"})
     * @Rest\View
     */
    public function indexAction(Event $event)
    {
        if (!$event->hasLyrics()) {
            throw new NotFoundHttpException();
        }

        return $this->createView(
            $this->lyricsListDataFactory->createFromEvent($event)
        );
    }

    /**
     * @ApiDoc(
     *     description="Get LyricItem by id.",
     *     section="Lyrics",
     *     output="ApiBundle\DataTransfer\Api\LyricData"
     * )
     * @Rest\Get(
     *     path="/events/{eventId}/lyrics/{lyricId}",
     *     name="ro_api_lyrics_get"
     * )
     * @ParamConverter("event", options={"id" = "eventId"})
     * @ParamConverter("lyric", options={"id" = "lyricId"})
     * @Rest\View
     */
    public function getAction(Event $event, Lyric $lyric)
    {
        if ($event->getId() !== $lyric->getLyrics()->getEvent()->getId()) {
            throw new NotFoundHttpException();
        }

        return $this->createView(
            LyricData::createFromEntity($lyric)
        );
    }
}

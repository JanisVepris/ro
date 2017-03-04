<?php
namespace ApiBundle\Controller\Api;

use ApiBundle\Controller\AbstractApiController;
use ApiBundle\DataTransfer\Api\TrackListData;
use ApiBundle\Factory\TrackDataFactory;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use FOS\RestBundle\Controller\Annotations as Rest;
use RoBundle\Entity\Event;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Functional as F;

/** @Rest\Route(service="api.controller.tracks_controller") */
class TracksController extends AbstractApiController
{
    /** @var TrackDataFactory */
    private $trackDataFactory;

    public function __construct(TrackDataFactory $trackDataFactory)
    {
        $this->trackDataFactory = $trackDataFactory;
    }

    /**
     * @ApiDoc(
     *     description="Get audio track list by playlist id",
     *     section="Audio",
     *     output="ApiBundle\DataTransfer\Api\TrackListData"
     * )
     * @Rest\Get(
     *     path="/api/events/{eventId}/audioPlaylist/tracks",
     *     name="ro_api_tracks_index"
     * )
     * @ParamConverter("event", options={"id" = "eventId"})
     * @Rest\View
     */
    public function indexAction(Event $event)
    {
        if (!$event->hasAudioPlaylist()) {
            throw new NotFoundHttpException();
        }

        $tracks = F\map($event->getPlaylist()->getTracks()->toArray(), [$this->trackDataFactory, 'createFromEntity']);

        return $this->createView(
            TrackListData::create($tracks)
        );
    }
}

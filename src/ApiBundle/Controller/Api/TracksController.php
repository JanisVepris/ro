<?php
namespace ApiBundle\Controller\Api;

use ApiBundle\Controller\AbstractApiController;
use ApiBundle\Factory\TrackListDataFactory;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use FOS\RestBundle\Controller\Annotations as Rest;
use RoBundle\Entity\Event;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/** @Rest\Route(service="api.controller.tracks_controller") */
class TracksController extends AbstractApiController
{
    /** @var TrackListDataFactory */
    private $trackListDataFactory;

    public function __construct(TrackListDataFactory $trackListDataFactory)
    {
        $this->trackListDataFactory = $trackListDataFactory;
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

        return $this->createView(
            $this->trackListDataFactory->createFromEvent($event)
        );
    }
}

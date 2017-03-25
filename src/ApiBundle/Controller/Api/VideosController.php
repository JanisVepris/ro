<?php
namespace ApiBundle\Controller\Api;

use ApiBundle\Controller\AbstractApiController;
use ApiBundle\Factory\VideoListDataFactory;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use FOS\RestBundle\Controller\Annotations as Rest;
use RoBundle\Entity\Event;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/** @Rest\Route(service="api.controller.videos_controller") */
class VideosController extends AbstractApiController
{
    /** @var VideoListDataFactory */
    private $videoListDataFactory;

    public function __construct(VideoListDataFactory $videoListDataFactory)
    {
        $this->videoListDataFactory = $videoListDataFactory;
    }

    /**
     * @ApiDoc(
     *     description="Get video list by playlist id",
     *     section="Video",
     *     output="ApiBundle\DataTransfer\Api\VideoListData"
     * )
     * @Rest\Get(
     *     path="/events/{eventId}/videoPlaylist/videos",
     *     name="ro_api_videos_index"
     * )
     * @ParamConverter("event", options={"id" = "eventId"})
     * @Rest\View
     */
    public function indexAction(Event $event)
    {
        if (!$event->hasVideoPlaylist()) {
            throw new NotFoundHttpException();
        }

        return $this->createView(
            $this->videoListDataFactory->createFromEvent($event)
        );
    }
}

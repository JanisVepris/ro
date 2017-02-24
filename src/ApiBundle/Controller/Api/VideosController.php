<?php
namespace ApiBundle\Controller\Api;

use ApiBundle\Controller\AbstractApiController;
use ApiBundle\DataTransfer\Api\VideoListData;
use ApiBundle\DataTransfer\Api\VideoListItemData;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use FOS\RestBundle\Controller\Annotations as Rest;
use RoBundle\Entity\Event;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Functional as F;

/** @Rest\Route(service="api.controller.videos_controller") */
class VideosController extends AbstractApiController
{
    /**
     * @ApiDoc(
     *     description="Get video list by playlist id",
     *     section="Video",
     *     output="ApiBundle\DataTransfer\Api\VideoListData"
     * )
     * @Rest\Get(
     *     path="/api/events/{eventId}/videoPlaylist/videos",
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

        $videos = $event->getVideoPlaylist()->getVideos();

        $videos = F\map($videos, [VideoListItemData::class, 'createFromEntity']);

        return $this->createView(
            new VideoListData($videos)
        );
    }
}

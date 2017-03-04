<?php
namespace AdminBundle\Controller;

use RoBundle\Entity\Event;
use RoBundle\Entity\Video;
use RoBundle\Form\Type\VideoPlaylistType;
use RoBundle\Service\VideoPlaylistService;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/** @Route("/event/{eventId}/videoPlaylist", service="admin.controller.video_playlists_controller") */
class AdminVideoPlaylistsController extends AbstractAdminController
{
    /** @var VideoPlaylistService */
    private $videoPlaylistService;

    public function __construct(VideoPlaylistService $videoPlaylistService)
    {
        $this->videoPlaylistService = $videoPlaylistService;
    }

    /**
     * @Route("/show", name="admin_video_playlists_show")
     * @Template
     * @ParamConverter("event", options={"id" = "eventId"})
     */
    public function showAction(Event $event)
    {
        return [
            'event' => $event
        ];
    }

    /**
     * @Route("/videos/add", name="admin_video_playlists_videos_add")
     * @Template
     * @ParamConverter("event", options={"id" = "eventId"})
     */
    public function addAction(Request $request, Event $event)
    {
        if (!$event->hasVideoPlaylistRelation()) {
            $this->videoPlaylistService->createPlaylistForEvent($event);
        }

        $playlist = $event->getVideoPlaylist();

        $form = $this->createForm(VideoPlaylistType::class, $playlist);

        $form->handleRequest($request);

        if ($form->isValid() && $form->isSubmitted()) {
            $this->videoPlaylistService->savePlaylistVideos($playlist);

            return $this->redirectToRoute('admin_video_playlists_show', ['eventId' => $event->getId()]);
        }

        return [
            'event' => $event,
            'form' => $form->createView()
        ];
    }

    /**
     * @Route("/videos/{videoId}/delete", name="admin_video_playlists_videos_delete")
     * @ParamConverter("event", options={"id" = "eventId"})
     * @ParamConverter("video", options={"id" = "videoId"})
     */
    public function deleteAction(Event $event, Video $video)
    {
        $this->videoPlaylistService->deleteVideo($video);

        return $this->redirectToRoute('admin_video_playlists_show', ['eventId' => $event->getId()]);
    }
}

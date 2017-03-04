<?php
namespace AdminBundle\Controller;

use RoBundle\Entity\Event;
use RoBundle\Entity\Track;
use RoBundle\Form\Type\AudioType;
use RoBundle\Service\AudioPlaylistService;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;

/** @Route("/event/{eventId}/audioPlaylist", service="admin.controller.audio_playlist_controller") */
class AdminAudioPlaylistController extends AbstractAdminController
{
    /** @var AudioPlaylistService */
    private $audioPlaylistService;

    public function __construct(AudioPlaylistService $audioPlaylistService)
    {
        $this->audioPlaylistService = $audioPlaylistService;
    }

    /**
     * @Route("/show", name="admin_playlist_show")
     * @Template
     * @ParamConverter("event", options={"id" = "eventId"})
     */
    public function showAction(Event $event)
    {
        return [
            'event' => $event,
            'playlist' => $event->getPlaylist(),
        ];
    }

    /**
     * @Route("/add", name="admin_playlist_add")
     * @Template("AdminBundle:AdminAudioPlaylist:form.html.twig")
     * @ParamConverter("event", options={"id" = "eventId"})
     */
    public function addAction(Request $request, Event $event)
    {
        $track = new Track();

        $form = $this->createForm(AudioType::class, $track);

        $form->handleRequest($request);

        if ($form->isValid() && $form->isSubmitted()) {
            $this->audioPlaylistService->addTrack($event, $track);

            return $this->redirectToRoute('admin_playlist_show', ['eventId' => $event->getId()]);
        }

        return [
            'event' => $event,
            'form' => $form->createView(),
        ];
    }

    /**
     * @Route("/{trackId}/delete", name="admin_playlist_delete")
     * @ParamConverter("event", options={"id" = "eventId"})
     * @ParamConverter("track", options={"id" = "trackId"})
     */
    public function deleteAction(Event $event, Track $track)
    {
        $this->audioPlaylistService->deleteTrack($track);

        return $this->redirectToRoute('admin_playlist_show', ['eventId' => $event->getId()]);
    }
}

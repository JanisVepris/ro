<?php
namespace AdminBundle\Controller;

use RoBundle\Entity\Event;
use RoBundle\Entity\Lyric;
use RoBundle\Form\Type\LyricType;
use RoBundle\Service\LyricsService;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;

/** @Route("/event/{eventId}/lyrics", service="admin.controller.lyrics_controller") */
class AdminLyricsController extends AbstractAdminController
{
    /** @var LyricsService */
    private $lyricsService;

    public function __construct(LyricsService $lyricsService)
    {
        $this->lyricsService = $lyricsService;
    }

    /**
     * @Route("/show", name="admin_lyrics_show")
     * @Template
     * @ParamConverter("event", options={"id" = "eventId"})
     */
    public function showAction(Event $event)
    {
        return [
            'event' => $event,
            'lyrics' => $event->getLyrics(),
        ];
    }

    /**
     * @Route("/add", name="admin_lyrics_add")
     * @Template("@Admin/AdminLyrics/form.html.twig")
     * @ParamConverter("event", options={"id" = "eventId"})
     */
    public function addAction(Request $request, Event $event)
    {
        $lyric = new Lyric();

        $form = $this->createForm(LyricType::class, $lyric);

        $form->handleRequest($request);

        if ($form->isValid() && $form->isSubmitted()) {
            $this->lyricsService->saveLyric($event, $lyric);

            return $this->redirectToRoute('admin_lyrics_show', ['eventId' => $event->getId()]);
        }

        return [
            'event' => $event,
            'form' => $form->createView()
        ];
    }

    /**
     * @Route("/{lyricId}/edit", name="admin_lyrics_edit")
     * @Template("@Admin/AdminLyrics/form.html.twig")
     * @ParamConverter("event", options={"id" = "eventId"})
     * @ParamConverter("lyric", options={"id" = "lyricId"})
     */
    public function editAction(Request $request, Event $event, Lyric $lyric)
    {
        $form = $this->createForm(LyricType::class, $lyric);

        $form->handleRequest($request);

        if ($form->isValid() && $form->isSubmitted()) {
            $this->lyricsService->saveLyric($event, $lyric);

            return $this->redirectToRoute('admin_lyrics_show', ['eventId' => $event->getId()]);
        }

        return [
            'event' => $event,
            'form' => $form->createView()
        ];
    }
}

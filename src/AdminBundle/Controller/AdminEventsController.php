<?php
namespace AdminBundle\Controller;

use RoBundle\Service\EventService;
use CoreBundle\Entity\User;
use RoBundle\Entity\Event;
use RoBundle\Form\Type\EventType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Stof\DoctrineExtensionsBundle\Uploadable\UploadableManager;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

/** @Route("/events", service="admin.controller.events_controller") */
class AdminEventsController extends AbstractAdminController
{
    /** @var EventService */
    private $eventService;

    /** @var UploadableManager */
    private $uploadableManager;

    public function __construct(EventService $eventService, UploadableManager $uploadableManager)
    {
        $this->eventService = $eventService;
        $this->uploadableManager = $uploadableManager;
    }

    /**
     * @Route("/list", name="admin_events_list")
     * @Template
     */
    public function listAction()
    {
        $events = $this->eventService->getAllEvents();

        return [
            'events' => $events,
        ];
    }

    /**
     * @Route("/create", name="admin_events_create")
     * @Template("@Admin/AdminEvents/form.html.twig")
     */
    public function createAction(Request $request)
    {
        $event = new Event();
        $form = $this->createForm(EventType::class, $event);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            if ($event->getEventImage()->getFile() instanceof UploadedFile) {
                $this->uploadableManager->markEntityToUpload(
                    $event->getEventImage(),
                    $event->getEventImage()->getFile()
                );
            }

            $this->eventService->saveEvent($event);
            return $this->redirectToRoute('admin_events_list');
        }

        return [
            'form' => $form->createView(),
        ];
    }

    /**
     * @Route("/edit/{eventId}", name="admin_events_edit")
     * @Template("@Admin/AdminEvents/form.html.twig")
     * @ParamConverter("event", options={"id" = "eventId"})
     */
    public function editAction(Request $request, Event $event)
    {
        $form = $this->createForm(EventType::class, $event);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            if ($event->getEventImage()->getFile() instanceof UploadedFile) {
                $this->uploadableManager->markEntityToUpload(
                    $event->getEventImage(),
                    $event->getEventImage()->getFile()
                );
            }

            $this->eventService->saveEvent($event);
            return $this->redirectToRoute('admin_events_list');
        }

        return [
            'form' => $form->createView(),
        ];
    }

    /**
     * @Route("/delete/{eventId}", name="admin_events_delete")
     * @ParamConverter("event", options={"id" = "eventId"})
     */
    public function deleteAction(Event $event)
    {
        if (!$this->securityContext->isGranted(User::ROLE_SUPER_ADMIN)) {
            throw new AccessDeniedHttpException('Forbidden');
        }

        $this->eventService->deleteEvent($event);

        return $this->redirectToRoute('admin_events_list');
    }

    /**
     * @Route("/delete/{eventId}/image", name="admin_events_image_delete")
     * @ParamConverter("event", options={"id" = "eventId"})
     */
    public function deleteImageAction(Event $event)
    {
        if (!$this->securityContext->isGranted(User::ROLE_SUPER_ADMIN)) {
            throw new AccessDeniedHttpException('Forbidden');
        }

        $this->eventService->deleteEventImage($event);
        return $this->redirectToRoute('admin_events_edit', ['eventId' => $event->getId()]);
    }
}

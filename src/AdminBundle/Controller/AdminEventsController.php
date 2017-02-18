<?php
namespace AdminBundle\Controller;

use AdminBundle\Service\EventService;
use RoBundle\Entity\Event;
use RoBundle\Form\Type\EventType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Stof\DoctrineExtensionsBundle\Uploadable\UploadableManager;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/events", service="admin.controller.event_controller")
 */
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
     * @return array
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
     * @Template
     * @param Request $request
     * @return array|RedirectResponse
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
}

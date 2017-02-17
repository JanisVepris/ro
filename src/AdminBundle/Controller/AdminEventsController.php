<?php
namespace AdminBundle\Controller;

use AdminBundle\Service\EventService;
use RoBundle\Entity\Event;
use RoBundle\Form\Type\EventType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/events", service="admin.controller.event_controller")
 */
class AdminEventsController extends AbstractAdminController
{
    /** @var EventService */
    private $eventService;

    public function __construct(EventService $eventService)
    {
        $this->eventService = $eventService;
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
            $this->eventService->saveEvent($event);
            return $this->redirectToRoute('admin_events_list');
        }

        return [
            'form' => $form->createView(),
        ];
    }
}

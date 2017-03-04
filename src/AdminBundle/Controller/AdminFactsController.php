<?php
namespace AdminBundle\Controller;

use RoBundle\Entity\Event;
use RoBundle\Entity\Facts;
use RoBundle\Service\FactsService;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use RoBundle\Form\Type\HtmlContentType;

/** @Route("/event/{eventId}/facts", service="admin.controller.facts_controller") */
class AdminFactsController extends AbstractAdminController
{
    /** @var FactsService */
    private $factsService;

    public function __construct(FactsService $factsService)
    {
        $this->factsService = $factsService;
    }

    /**
     * @Route("/edit", name="admin_facts_edit")
     * @Template
     * @ParamConverter("event", options={"id" = "eventId"})
     */
    public function editAction(Request $request, Event $event)
    {
        $facts = $event->getFacts();

        if (!$facts) {
            $facts = new Facts();
            $facts->setEvent($event);
        }

        $form = $this->createForm(HtmlContentType::class, $facts);

        $form->handleRequest($request);

        if ($form->isValid() && $form->isSubmitted()) {
            $this->factsService->saveFacts($event, $facts);
        }

        return [
            'event' => $event,
            'form' => $form->createView()
        ];
    }
}

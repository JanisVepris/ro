<?php
namespace AdminBundle\Controller;

use RoBundle\Entity\Event;
use RoBundle\Entity\Script;
use RoBundle\Form\Type\ScriptType;
use RoBundle\Service\ScriptService;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;

/** @Route("/event/{eventId}/script", service="admin.controller.scripts_controller") */
class AdminScriptsController extends AbstractAdminController
{
    /** @var ScriptService */
    private $scriptService;

    public function __construct(ScriptService $scriptService)
    {
        $this->scriptService = $scriptService;
    }

    /**
     * @Route("/edit", name="admin_scripts_edit")
     * @Template
     * @ParamConverter("event", options={"id" = "eventId"})
     */
    public function editAction(Request $request, Event $event)
    {
        $script = $event->getScript();

        if (!$script) {
            $script = new Script();
            $script->setEvent($event);
        }

        $form = $this->createForm(ScriptType::class, $script);

        $form->handleRequest($request);

        if ($form->isValid() && $form->isSubmitted()) {
            $this->scriptService->saveScript($event, $script);
        }

        return [
            'event' => $event,
            'form' => $form->createView()
        ];
    }
}

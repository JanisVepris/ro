<?php
namespace AdminBundle\Controller;

use RoBundle\Entity\Event;
use RoBundle\Entity\Team;
use RoBundle\Form\Type\HtmlContentType;
use RoBundle\Service\TeamService;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;

/** @Route("/event/{eventId}/team", service="admin.controller.teamss_controller") */
class AdminTeamsController extends AbstractAdminController
{
    /** @var TeamService */
    private $teamService;

    public function __construct(TeamService $teamService)
    {
        $this->teamService = $teamService;
    }

    /**
     * @Route("/edit", name="admin_teams_edit")
     * @Template
     * @ParamConverter("event", options={"id" = "eventId"})
     */
    public function editAction(Request $request, Event $event)
    {
        $team = $event->getTeam();

        if (!$team) {
            $team = new Team();
            $team->setEvent($event);
        }

        $form = $this->createForm(HtmlContentType::class, $team, [
            'data_class' => Team::class
        ]);

        $form->handleRequest($request);

        if ($form->isValid() && $form->isSubmitted()) {
            $this->teamService->saveTeam($event, $team);
        }

        return [
            'event' => $event,
            'form' => $form->createView()
        ];
    }
}

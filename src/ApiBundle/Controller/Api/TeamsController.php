<?php
namespace ApiBundle\Controller\Api;

use ApiBundle\Controller\AbstractApiController;
use ApiBundle\DataTransfer\Api\HtmlContentData;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use FOS\RestBundle\Controller\Annotations as Rest;
use RoBundle\Entity\Event;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/** @Rest\Route(service="api.controller.teams_controller") */
class TeamsController extends AbstractApiController
{
    /**
     * @ApiDoc(
     *     description="Get team page content by event id.",
     *     section="Team",
     *     output="ApiBundle\DataTransfer\Api\HtmlContentData"
     * )
     * @Rest\Get(
     *     path="/api/events/{eventId}/team",
     *     name="ro_api_teams_get"
     * )
     * @ParamConverter("event", options={"id" = "eventId"})
     * @Rest\View
     */
    public function getAction(Event $event)
    {
        if (!$event->hasTeam()) {
            throw new NotFoundHttpException();
        }

        return $this->createView(
            HtmlContentData::create($event->getTeam()->getContent())
        );
    }
}

<?php
namespace ApiBundle\Controller\Api;

use ApiBundle\Controller\AbstractApiController;
use ApiBundle\DataTransfer\Api\HtmlContentData;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use FOS\RestBundle\Controller\Annotations as Rest;
use RoBundle\Entity\Event;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/** @Rest\Route(service="api.controller.scripts_controller") */
class ScriptsController extends AbstractApiController
{
    /**
     * @ApiDoc(
     *     description="Get script page content by event id.",
     *     section="Script",
     *     output="ApiBundle\DataTransfer\Api\HtmlContentData"
     * )
     * @Rest\Get(
     *     path="/api/events/{eventId}/script",
     *     name="ro_api_scripts_get"
     * )
     * @ParamConverter("event", options={"id" = "eventId"})
     * @Rest\View
     */
    public function getAction(Event $event)
    {
        // TODO: add metadata
        if (!$event->hasScript()) {
            throw new NotFoundHttpException();
        }

        return $this->createView(
            HtmlContentData::create($event->getScript()->getContent())
        );
    }
}

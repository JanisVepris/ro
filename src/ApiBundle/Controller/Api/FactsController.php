<?php
namespace ApiBundle\Controller\Api;

use ApiBundle\Controller\AbstractApiController;
use ApiBundle\DataTransfer\Api\HtmlContentData;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use FOS\RestBundle\Controller\Annotations as Rest;
use RoBundle\Entity\Event;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/** @Rest\Route(service="api.controller.facts_controller") */
class FactsController extends AbstractApiController
{
    /**
     * @ApiDoc(
     *     description="Get facts page content by event id.",
     *     section="Facts",
     *     output="ApiBundle\DataTransfer\Api\HtmlContentData"
     * )
     * @Rest\Get(
     *     path="/api/events/{eventId}/facts",
     *     name="ro_api_facts_get"
     * )
     * @ParamConverter("event", options={"id" = "eventId"})
     * @Rest\View
     */
    public function getAction(Event $event)
    {
        if (!$event->hasFacts()) {
            throw new NotFoundHttpException();
        }

        return $this->createView(
            HtmlContentData::create($event->getFacts()->getContent())
        );
    }
}

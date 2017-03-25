<?php
namespace ApiBundle\Controller\Api;

use ApiBundle\Controller\AbstractApiController;
use ApiBundle\Factory\ScriptDataFactory;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use FOS\RestBundle\Controller\Annotations as Rest;
use RoBundle\Entity\Event;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/** @Rest\Route(service="api.controller.scripts_controller") */
class ScriptsController extends AbstractApiController
{
    /** @var ScriptDataFactory */
    private $scriptDataFactory;

    public function __construct(ScriptDataFactory $scriptDataFactory)
    {
        $this->scriptDataFactory = $scriptDataFactory;
    }

    /**
     * @ApiDoc(
     *     description="Get script page content by event id.",
     *     section="Script",
     *     output="ApiBundle\DataTransfer\Api\HtmlContentData"
     * )
     * @Rest\Get(
     *     path="/events/{eventId}/script",
     *     name="ro_api_scripts_get"
     * )
     * @ParamConverter("event", options={"id" = "eventId"})
     * @Rest\View
     */
    public function getAction(Event $event)
    {
        if (!$event->hasScript()) {
            throw new NotFoundHttpException();
        }

        return $this->createView(
            $this->scriptDataFactory->createFromEvent($event)
        );
    }
}

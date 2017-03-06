<?php
namespace ApiBundle\Controller\Api;

use ApiBundle\Controller\AbstractApiController;
use ApiBundle\Factory\PosterDataFactory;
use CoreBundle\Service\AbsoluteUrlGenerator;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use FOS\RestBundle\Controller\Annotations as Rest;
use RoBundle\Entity\Event;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/** @Rest\Route(service="api.controller.posters_controller") */
class PostersController extends AbstractApiController
{
    /** @var PosterDataFactory */
    private $posterDataFactory;

    /**
     * @param AbsoluteUrlGenerator $absoluteUrlGenerator
     */
    public function __construct(PosterDataFactory $posterDataFactory)
    {
        $this->posterDataFactory = $posterDataFactory;
    }

    /**
     * @ApiDoc(
     *     description="Get event poster by id",
     *     section="Poster",
     *     output="ApiBundle\DataTransfer\Api\PosterData"
     * )
     * @Rest\Get(
     *     path="/api/events/{eventId}/poster",
     *     name="ro_api_posters_get"
     * )
     * @ParamConverter("event", options={"id" = "eventId"})
     * @Rest\View
     */
    public function getAction(Event $event)
    {
        if (!$event->hasPoster()) {
            throw new NotFoundHttpException();
        }

        return $this->createView(
            $this->posterDataFactory->createFromEvent($event)
        );
    }
}

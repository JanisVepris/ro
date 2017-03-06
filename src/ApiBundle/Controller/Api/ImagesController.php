<?php
namespace ApiBundle\Controller\Api;

use ApiBundle\Controller\AbstractApiController;
use ApiBundle\Factory\GalleryImageListDataFactory;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use FOS\RestBundle\Controller\Annotations as Rest;
use RoBundle\Entity\Event;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/** @Rest\Route(service="api.controller.images_controller") */
class ImagesController extends AbstractApiController
{
    /** @var GalleryImageListDataFactory */
    private $galleryImageListDataFactory;

    public function __construct(GalleryImageListDataFactory $galleryImageListDataFactory)
    {
        $this->galleryImageListDataFactory = $galleryImageListDataFactory;
    }

    /**
     * @ApiDoc(
     *     description="Get image list by gallery id",
     *     section="Gallery",
     *     output="ApiBundle\DataTransfer\Api\GalleryImageListData"
     * )
     * @Rest\Get(
     *     path="/api/events/{eventId}/gallery/images",
     *     name="ro_api_images_index"
     * )
     * @ParamConverter("event", options={"id" = "eventId"})
     * @Rest\View
     */
    public function indexAction(Event $event)
    {
        if (!$event->hasGallery()) {
            throw new NotFoundHttpException();
        }

        return $this->createView(
            $this->galleryImageListDataFactory->createFromEvent($event)
        );
    }
}

<?php
namespace ApiBundle\Controller\Api;

use ApiBundle\Controller\AbstractApiController;
use ApiBundle\DataTransfer\Api\UrlItemListData;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use FOS\RestBundle\Controller\Annotations as Rest;
use RoBundle\Entity\Event;
use RoBundle\Service\GalleryService;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Functional as F;

/** @Rest\Route(service="api.controller.images_controller") */
class ImagesController extends AbstractApiController
{
    /** @var GalleryService */
    private $galleryService;

    /**
     * @param GalleryService $galleryService
     */
    public function __construct(GalleryService $galleryService)
    {
        $this->galleryService = $galleryService;
    }

    /**
     * @ApiDoc(
     *     description="Get image list by gallery id",
     *     section="Gallery",
     *     output="ApiBundle\DataTransfer\Api\UrlItemListData"
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
        $images = $this->galleryService->getImageListData($event);

        return $this->createView(
            UrlItemListData::create($images)
        );
    }
}

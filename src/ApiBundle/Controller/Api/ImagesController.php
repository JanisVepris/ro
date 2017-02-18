<?php
namespace ApiBundle\Controller\Api;

use ApiBundle\Controller\AbstractApiController;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use FOS\RestBundle\Controller\Annotations as Rest;

class ImagesController extends AbstractApiController
{
    /**
     * @ApiDoc(
     *     description="Get image list by gallery id",
     *     section="Gallery",
     *     tags={"TODO"}
     * )
     * @Rest\Get(
     *     path="/api/events/{eventId}/galleries/{galleryId}/images",
     *     name="ro_api_images_index"
     * )
     * @Rest\View
     */
    public function indexAction()
    {
        return $this->createView([]);
    }
}

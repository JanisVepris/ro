<?php
namespace ApiBundle\Controller\Api;

use ApiBundle\Controller\AbstractApiController;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use FOS\RestBundle\Controller\Annotations as Rest;

class ArticlesController extends AbstractApiController
{
    /**
     * @ApiDoc(
     *     description="Get article list by event id",
     *     section="Article",
     *     tags={"TODO"}
     * )
     * @Rest\Get(
     *     path="/api/events/{eventId}/articles",
     *     name="ro_api_articles_index"
     * )
     * @Rest\View
     */
    public function indexAction()
    {
        return $this->createView([]);
    }

    /**
     * @ApiDoc(
     *     description="Get article by id",
     *     section="Article",
     *     tags={"TODO"}
     * )
     * @Rest\Get(
     *     path="/api/events/{eventId}/articles/{articleId}",
     *     name="ro_api_articles_get"
     * )
     * @Rest\View
     */
    public function getAction()
    {
        return $this->createView([]);
    }
}

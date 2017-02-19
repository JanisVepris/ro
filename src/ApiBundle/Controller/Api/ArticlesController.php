<?php
namespace ApiBundle\Controller\Api;

use ApiBundle\Controller\AbstractApiController;
use ApiBundle\DataTransfer\Api\ArticleData;
use ApiBundle\DataTransfer\Api\ArticleListData;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use FOS\RestBundle\Controller\Annotations as Rest;
use RoBundle\Entity\Event;
use RoBundle\Service\ArticleService;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

/** @Rest\Route(service="api.controller.articles_controller") */
class ArticlesController extends AbstractApiController
{
    /** @var ArticleService */
    private $articleService;

    public function __construct(ArticleService $articleService)
    {
        $this->articleService = $articleService;
    }

    /**
     * @ApiDoc(
     *     description="Get article list by event id",
     *     section="Article",
     *     output="ApiBundle\DataTransfer\Api\ArticleListData"
     * )
     * @Rest\Get(
     *     path="/api/events/{eventId}/articles",
     *     name="ro_api_articles_index"
     * )
     * @Rest\QueryParam(
     *     name="limit",
     *     key="limit",
     *     requirements="\d+",
     *     default="10",
     * )
     * @Rest\QueryParam(
     *     name="offset",
     *     key="offset",
     *     requirements="\d+",
     *     default="0",
     * )
     * @ParamConverter("event", options={"id" = "eventId"})
     * @Rest\View
     */
    public function indexAction(Event $event, $limit, $offset)
    {
        $articles = $this->articleService->getPublishedArticles($event, $limit, $offset);
        $articleCount = $this->articleService->countPublishedArticles($event);

        return $this->createView(
            ArticleListData::create($articleCount, $limit, $offset, $articles)
        );
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
     * @ParamConverter("event", options={"id" = "eventId"})
     * @Rest\View
     */
    public function getAction(Event $event, $articleId)
    {
        $article = $this->articleService->getPublishedArticleById($event, $articleId);

        return $this->createView(
            ArticleData::createFromEntity($article)
        );
    }
}

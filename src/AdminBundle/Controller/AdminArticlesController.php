<?php
namespace AdminBundle\Controller;

use RoBundle\Entity\Article;
use RoBundle\Entity\Event;
use RoBundle\Form\Type\ArticleType;
use RoBundle\Service\ArticleService;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;

/** @Route("/event/{eventId}/articles", service="admin.controller.articles_controller") */
class AdminArticlesController extends AbstractAdminController
{
    /** @var ArticleService */
    private $articleService;

    public function __construct(ArticleService $articleService)
    {
        $this->articleService = $articleService;
    }

    /**
     * @Route("/list", name="admin_articles_list")
     * @Template
     * @ParamConverter("event", options={"id" = "eventId"})
     */
    public function listAction(Event $event)
    {
        $articles = $this->articleService->getPublishedArticles($event);

        return [
            'event' => $event,
            'articles' => $articles,
        ];
    }

    /**
     * @Route("/create", name="admin_articles_create")
     * @Template("@Admin/AdminArticles/form.html.twig")
     * @ParamConverter("event", options={"id" = "eventId"})
     */
    public function createAction(Request $request, Event $event)
    {
        $article = new Article();
        $form = $this->createForm(ArticleType::class, $article);
        $form->handleRequest($request);

        if ($form->isValid() && $form->isSubmitted()) {
            $this->articleService->saveArticle($article, $event);

            return $this->redirectToRoute('admin_articles_list', ['eventId' => $event->getId()]);
        }

        return [
            'event' => $event,
            'form' => $form->createView(),
        ];
    }
}

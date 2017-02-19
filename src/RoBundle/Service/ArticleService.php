<?php
namespace RoBundle\Service;

use Doctrine\ORM\EntityManager;
use RoBundle\Entity\Article;
use RoBundle\Entity\Event;
use RoBundle\Repository\ArticleRepository;
use Stof\DoctrineExtensionsBundle\Uploadable\UploadableManager;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class ArticleService
{
    /** @var EntityManager */
    private $em;

    /** @var UploadableManager */
    private $uploadableManager;

    /** @var ArticleRepository */
    private $articleRepository;

    public function __construct(
        EntityManager $em,
        UploadableManager $uploadableManager,
        ArticleRepository $articleRepository
    ) {
        $this->em = $em;
        $this->uploadableManager = $uploadableManager;
        $this->articleRepository = $articleRepository;
    }

    public function saveArticle(Article $article, Event $event)
    {
        $article->setEvent($event);

        if ($article->getArticleImage()->getFile() instanceof UploadedFile) {
            $this->uploadableManager->markEntityToUpload(
                $article->getArticleImage(),
                $article->getArticleImage()->getFile()
            );
        }

        $this->em->persist($article);
        $this->em->flush($article);
    }

    /**
     * @param Event $event
     * @return Article[]
     */
    public function getPublishedArticles(Event $event)
    {
        return $this->articleRepository->findAllPublishedArticlesByEvent($event);
    }
}

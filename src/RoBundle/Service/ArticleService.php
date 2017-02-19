<?php
namespace RoBundle\Service;

use Doctrine\ORM\EntityManager;
use RoBundle\Entity\Article;
use RoBundle\Entity\Event;
use Stof\DoctrineExtensionsBundle\Uploadable\UploadableManager;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class ArticleService
{
    /** @var EntityManager */
    private $em;

    /** @var UploadableManager */
    private $uploadableManager;

    public function __construct(EntityManager $em, UploadableManager $uploadableManager)
    {
        $this->em = $em;
        $this->uploadableManager = $uploadableManager;
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
}

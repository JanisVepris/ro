<?php

namespace CoreBundle\Service;

use Liip\ImagineBundle\Controller\ImagineController;
use Liip\ImagineBundle\Imagine\Cache\CacheManager;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;

class ImageResizer
{
    /** @var Request */
    private $request;

    /** @var AbsoluteUrlGenerator */
    private $absoluteUrlGenerator;

    /** @var CacheManager */
    private $liipImagineCacheManager;

    /** @var ImagineController */
    private $liipImagineController;

    public function __construct(
        RequestStack $requestStack,
        AbsoluteUrlGenerator $absoluteUrlGenerator,
        CacheManager $liipImagine,
        ImagineController $imagineController
    ) {
        $this->request = $requestStack->getCurrentRequest();
        $this->absoluteUrlGenerator = $absoluteUrlGenerator;
        $this->liipImagineCacheManager = $liipImagine;
        $this->liipImagineController = $imagineController;
    }

    /**
     * @param string $imageUri
     * @return string
     */
    public function getSmallArticleThumbnail($imageUri)
    {
//        $imageUri = $this->removeLeadingSlash($imageUri);

        $this->resizeImage($imageUri, 'article_thumb_small');

        return $this->liipImagineCacheManager->getBrowserPath($imageUri, 'article_thumb_small');
    }

    /**
     * @param string $imageUri
     * @return string
     */
    public function getBigArticleThumbnail($imageUri)
    {
//        $imageUri = $this->removeLeadingSlash($imageUri);

        $this->resizeImage($imageUri, 'article_thumb_big');

        return $this->liipImagineCacheManager->getBrowserPath($imageUri, 'article_thumb_big');
    }

    private function resizeImage($imageUri, $filterName)
    {
        $this->liipImagineController->filterAction(
            $this->request,
            $imageUri,
            $filterName
        );
    }

    private function removeLeadingSlash($imageUri)
    {
        return preg_replace('/^\//', '', $imageUri);
    }
}

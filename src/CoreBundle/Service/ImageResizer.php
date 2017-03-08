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
        $this->resizeImage($imageUri, 'article_thumb_small');

        return $this->liipImagineCacheManager->getBrowserPath($imageUri, 'article_thumb_small');
    }

    /**
     * @param string $imageUri
     * @return string
     */
    public function getBigArticleThumbnail($imageUri)
    {
        $this->resizeImage($imageUri, 'article_thumb_big');

        return $this->liipImagineCacheManager->getBrowserPath($imageUri, 'article_thumb_big');
    }

    /**
     * @param string $imageUri
     * @return string
     */
    public function getFacebookPreviewImage($imageUri)
    {
        $this->resizeImage($imageUri, 'og_preview_image');

        return $this->liipImagineCacheManager->getBrowserPath($imageUri, 'og_preview_image');
    }

    public function getGalleryImageThumbnail($imageUri)
    {
        $this->resizeImage($imageUri, 'gallery_thumb');

        return $this->liipImagineCacheManager->getBrowserPath($imageUri, 'gallery_thumb');
    }

    public function getGalleryImageForMobile($imageUri)
    {
        $this->resizeImage($imageUri, 'gallery_image_mobile');

        return $this->liipImagineCacheManager->getBrowserPath($imageUri, 'gallery_image_mobile');
    }

    private function resizeImage($imageUri, $filterName)
    {
        $this->liipImagineController->filterAction(
            $this->request,
            $imageUri,
            $filterName
        );
    }
}

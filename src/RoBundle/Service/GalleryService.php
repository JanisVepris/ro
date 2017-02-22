<?php

namespace RoBundle\Service;

use Doctrine\ORM\EntityManager;
use RoBundle\Entity\Event;
use RoBundle\Entity\Gallery;
use RoBundle\Entity\GalleryImage;
use Stof\DoctrineExtensionsBundle\Uploadable\UploadableManager;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class GalleryService
{
    /** @var EntityManager */
    private $em;

    /** @var UploadableManager */
    private $uploadableManager;

    /**
     * @param EntityManager $em
     */
    public function __construct(EntityManager $em, UploadableManager $uploadableManager)
    {
        $this->em = $em;
        $this->uploadableManager = $uploadableManager;
    }

    public function createGalleryForEvent(Event $event)
    {
        $gallery = new Gallery();
        $gallery->setEvent($event);

        $this->em->persist($gallery);
        $this->em->flush($gallery);
    }

    public function addUploadedImageToGallery(Gallery $gallery, UploadedFile $file)
    {
        $galleryImage = new GalleryImage();
        $galleryImage->setFile($file);

        $this->uploadableManager->markEntityToUpload(
            $galleryImage,
            $galleryImage->getFile()
        );

        $gallery->addImage($galleryImage);
        $galleryImage->setGallery($gallery);

        $this->em->persist($gallery);
        $this->em->persist($galleryImage);
        $this->em->flush();

        return $galleryImage->getFileName();
    }

    public function removeGalleryImage($image)
    {
        $this->em->remove($image);
        $this->em->flush();
    }
}

<?php
namespace AdminBundle\Controller;

use RoBundle\Entity\Event;
use RoBundle\Entity\Gallery;
use RoBundle\Entity\GalleryImage;
use RoBundle\Form\Type\UploadFileType;
use RoBundle\Service\GalleryService;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Stof\DoctrineExtensionsBundle\Uploadable\UploadableManager;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Functional as F;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/** @Route("/event/{eventId}/gallery", service="admin.controller.galleries_controller") */
class AdminGalleriesController extends AbstractAdminController
{
    /** @var GalleryService */
    private $galleryService;

    /** @var UploadableManager */
    private $uploadableManager;

    /** @var string */
    private $uploadDir;

    /**
     * @param GalleryService $galleryService
     */
    public function __construct(GalleryService $galleryService, UploadableManager $uploadableManager, $uploadDir)
    {
        $this->galleryService = $galleryService;
        $this->uploadableManager = $uploadableManager;
        $this->uploadDir = $uploadDir;
    }

    /**
     * @Route("/show", name="admin_galleries_show")
     * @Template
     * @ParamConverter("event", options={"id" = "eventId"})
     */
    public function showAction(Event $event)
    {
        return [
            'event' => $event,
            'gallery' => $event->getGallery()
        ];
    }

    /**
     * @Route("/create", name="admin_galleries_create")
     * @ParamConverter("event", options={"id" = "eventId"})
     */
    public function createAction(Event $event)
    {
        $this->galleryService->createGalleryForEvent($event);

        return $this->redirectToRoute('admin_galleries_show', ['eventId' => $event->getId()]);
    }

    /**
     * @Route("/images/add", name="admin_galleries_images_add")
     * @Template
     * @ParamConverter("event", options={"id" = "eventId"})
     */
    public function addAction(Event $event)
    {
        return [
            'event' => $event
        ];
    }

    /**
     * @Route("/image/upload", name="admin_galleries_image_upload")
     * @ParamConverter("event", options={"id" = "eventId"})
     */
    public function imageUploadAction(Request $request, Event $event)
    {
        $gallery = $event->getGallery();

        if (!$gallery) {
            throw new NotFoundHttpException();
        }

        $file = $this->getUploadedFile($request);

        $filename = $this->galleryService->addUploadedImageToGallery($gallery, $file);

        return new JsonResponse([
            'filename' => $filename
        ]);
    }

    /**
     * @Route("/image/{imageId}/remove", name="admin_galleries_image_remove")
     * @ParamConverter("event", options={"id" = "eventId"})
     * @ParamConverter("image", options={"id" = "imageId"})
     */
    public function imageRemoveAction(Event $event, GalleryImage $image)
    {
        $this->galleryService->removeGalleryImage($image);

        return $this->redirectToRoute('admin_galleries_show', ['eventId' => $event->getId()]);
    }

    /** @return UploadedFile */
    private function getUploadedFile(Request $request)
    {
        $files = $request->files;

        $files = F\map($files, function ($file) {
            return $file;
        });

        /** @var UploadedFile $file */
        $file = $files["file"];

        return $file[0];
    }
}

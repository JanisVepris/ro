<?php
namespace AdminBundle\Controller;

use AdminBundle\DataTransfer\UploadedArticleImageData;
use CoreBundle\Service\AbsoluteUrlGenerator;
use JMS\Serializer\SerializerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Functional as F;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\UnsupportedMediaTypeHttpException;

/** @Route(service="admin.controller.article_content_image_controller") */
class ImageUploadController extends AbstractAdminController
{
    /** @var string */
    private $uploadDir;

    /** @var AbsoluteUrlGenerator */
    private $absoluteUrlGenerator;

    /** @var SerializerInterface */
    private $serializer;

    /**
     * @param string $uploadDir
     * @param AbsoluteUrlGenerator $absoluteUrlGenerator
     */
    public function __construct($uploadDir, AbsoluteUrlGenerator $absoluteUrlGenerator, SerializerInterface $serializer)
    {
        $this->uploadDir = $uploadDir;
        $this->absoluteUrlGenerator = $absoluteUrlGenerator;
        $this->serializer = $serializer;
    }

    /**
     * @Route(
     *     name="admin_article_content_image_upload",
     *     path="/article/image/upload",
     * )
     * @Method({"POST", "GET"})
     */
    public function uploadAction(Request $request)
    {
        $files = $request->files;

        $files = F\map($files, function ($file) {
            return $file;
        });

        /** @var UploadedFile $file */
        $file = $files["upload"];

        $this->checkMimeType($file);

        $filename = sprintf(
            '%s.%s%s.%s',
            time(),
            base64_encode($file->getFilename()),
            uniqid(),
            $file->guessExtension()
        );

        $file->move($this->uploadDir, $filename);

        $uploadedFileData = UploadedArticleImageData::create(
            $filename,
            $this->absoluteUrlGenerator->generateAbsoluteUrlFromRelative('/uploads/media/Images/' . $filename)
        );

        return new Response(
            $this->serializer->serialize($uploadedFileData, 'json')
        );
    }

    private function checkMimeType(UploadedFile $file)
    {
        $allowedMimeTypes = ['image/jpeg', 'image/jpg', 'image/png'];

        if (!in_array($file->getMimeType(), $allowedMimeTypes)) {
            throw new UnsupportedMediaTypeHttpException();
        }
    }
}

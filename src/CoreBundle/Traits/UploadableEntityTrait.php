<?php
namespace CoreBundle\Traits;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Gedmo\Mapping\Annotation as Gedmo;

trait UploadableEntityTrait
{
    /**
     * @var string
     *
     * @ORM\Column(name="file_path", type="string", length=255)
     * @Gedmo\UploadableFilePath
     */
    private $filePath;

    /**
     * @var string
     *
     * @ORM\Column(name="file_name", type="string", length=255)
     * @Gedmo\UploadableFileName
     */
    private $fileName;

    /**
     * @var string
     * @ORM\Column(name="mime_type", type="string", nullable=true)
     */
    private $mimeType;

    public function getFilePath()
    {
        return $this->filePath;
    }

    /**
     * @param string $filePath
     * @return $this
     */
    public function setFilePath($filePath)
    {
        $this->filePath = $filePath;

        return $this;
    }

    public function getFileName()
    {
        return $this->fileName;
    }

    /**
     * @param string $fileName
     * @return $this
     */
    public function setFileName($fileName)
    {
        $this->fileName = $fileName;

        return $this;
    }

    public function getFile()
    {
        return $this->file;
    }

    /**
     * @param UploadedFile $file
     * @return $this
     */
    public function setFile($file)
    {
        $this->file = $file;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getWebPath()
    {
        if (!$this->filePath) {
            return null;
        }

        $path = preg_replace('/^web\//', '', $this->filePath);

        return sprintf('/%s', $path);
    }

    public function getMimeType()
    {
        return $this->mimeType;
    }

    /**
     * @ORM\PrePersist()
     */
    public function updateMimeType()
    {
        $this->mimeType = $this->file->getMimeType();
    }

    public function setAsFixture()
    {
        $this->uploadPath = sprintf('web/%s', $this->uploadPath);
    }
}

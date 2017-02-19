<?php
namespace CoreBundle\Traits;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;

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
     * @var UploadedFile
     * @Assert\File()
     */
    public $file;

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

    public function setAsFixture()
    {
        $this->uploadPath = sprintf('web/%s', $this->uploadPath);
    }
}

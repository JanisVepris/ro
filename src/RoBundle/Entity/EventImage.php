<?php
namespace RoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Gedmo\Mapping\Annotation\Uploadable;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Table(name="ro3_event_images")
 * @ORM\Entity()
 * @Uploadable(path="web/uploads/media/EventPic/", allowOverwrite=true, appendNumber=true, filenameGenerator="ALPHANUMERIC")
 */
class EventImage
{
    /**
     * @var integer
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

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


    public function getId()
    {
        return $this->id;
    }

    public function getFilePath()
    {
        return $this->filePath;
    }

    /**
     * @param string $filePath
     * @return EventImage
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
     * @return EventImage
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
     * @return EventImage
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
}

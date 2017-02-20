<?php
namespace AdminBundle\DataTransfer;

use JMS\Serializer\Annotation as Serializer;

class UploadedArticleImageData
{
    /**
     * @var integer
     * @Serializer\Type("integer")
     */
    private $uploaded = 1;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    private $filename;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    private $url;

    /**
     * @param integer $uploaded
     * @param string $filename
     * @param string $url
     */
    private function __construct($uploaded, $filename, $url)
    {
        $this->uploaded = $uploaded;
        $this->filename = $filename;
        $this->url = $url;
    }

    /**
     * @param string $filename
     * @param string $url
     * @return static
     */
    public static function create($filename, $url)
    {
        return new static(1, $filename, $url);
    }
}

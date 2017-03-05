<?php
namespace ApiBundle\DataTransfer\Api;

use JMS\Serializer\Annotation as Serializer;

class MetaData
{
    /**
     * @var string
     * @Serializer\Type("string")
     */
    private $ogTitle;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    private $ogDescription;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    private $ogType;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    private $ogSiteName;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    private $ogLocale = 'lt_LT';

    /**
     * @var string
     * @Serializer\Type("string")
     */
    private $ogImage;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    private $ogImageType;

    /**
     * @var integer
     * @Serializer\Type("integer")
     */
    private $ogImageHeight = 630;

    /**
     * @var integer
     * @Serializer\Type("integer")
     */
    private $ogImageWidth = 1200;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    private $googleDescription;

    /**
     * @param string $ogTitle
     * @param string $ogDescription
     * @param string $ogType
     * @param string $ogSiteName
     * @param string $ogLocale
     * @param string $ogImage
     * @param string $ogImageType
     * @param integer $ogImageHeight
     * @param integer $ogImageWidth
     * @param string $googleDescription
     */
    public function __construct(
        $ogTitle,
        $ogDescription,
        $ogType,
        $ogSiteName,
        $ogImage,
        $ogImageType,
        $googleDescription,
        $ogImageHeight,
        $ogImageWidth,
        $ogLocale
    ) {
        $this->ogTitle = $ogTitle;
        $this->ogDescription = $ogDescription;
        $this->ogType = $ogType;
        $this->ogSiteName = $ogSiteName;
        $this->ogLocale = $ogLocale;
        $this->ogImage = $ogImage;
        $this->ogImageType = $ogImageType;
        $this->ogImageHeight = $ogImageHeight;
        $this->ogImageWidth = $ogImageWidth;
        $this->googleDescription = $googleDescription;
    }

    /**
     * @param string $ogTitle
     * @param string $ogDescription
     * @param string $ogUrl
     * @param string $ogType
     * @param string $ogSiteName
     * @param string $ogLocale
     * @param string $ogImage
     * @param string $ogImageType
     * @param integer $ogImageHeight
     * @param integer $ogImageWidth
     * @param string $googleDescription
     * @return static
     */
    public static function create(
        $ogTitle,
        $ogDescription,
        $ogType,
        $ogSiteName,
        $ogImage,
        $ogImageType,
        $googleDescription,
        $ogImageHeight = 630,
        $ogImageWidth = 1200,
        $ogLocale = 'lt_LT'
    ) {
        return new static(
            $ogTitle,
            $ogDescription,
            $ogType,
            $ogSiteName,
            $ogImage,
            $ogImageType,
            $googleDescription,
            $ogImageHeight,
            $ogImageWidth,
            $ogLocale
        );
    }
}

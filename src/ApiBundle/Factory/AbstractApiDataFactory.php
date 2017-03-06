<?php
namespace ApiBundle\Factory;

use CoreBundle\Service\AbsoluteUrlGenerator;
use CoreBundle\Service\ImageResizer;

class AbstractApiDataFactory
{
    /** @var MetaDataFactory */
    protected $metaDataFactory;

    /** @var AbsoluteUrlGenerator */
    protected $absoluteUrlGenerator;

    /** @var ImageResizer */
    protected $imageResizer;

    public function setMetaDataFactory(MetaDataFactory $metaDataFactory)
    {
        $this->metaDataFactory = $metaDataFactory;
    }

    public function setAbsoluteUrlGenerator(AbsoluteUrlGenerator $absoluteUrlGenerator)
    {
        $this->absoluteUrlGenerator = $absoluteUrlGenerator;
    }

    public function setImageResizer(ImageResizer $imageResizer)
    {
        $this->imageResizer = $imageResizer;
    }
}

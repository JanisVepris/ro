<?php
namespace ApiBundle\Factory;

use ApiBundle\DataTransfer\Api\GalleryImageListData;
use ApiBundle\DataTransfer\Api\UrlItemData;
use RoBundle\Entity\Event;
use Functional as F;
use RoBundle\Entity\GalleryImage;

class GalleryImageListDataFactory extends AbstractApiDataFactory
{
    public function createFromEvent(Event $event)
    {
        /** @var UrlItemData[] $images */
        $images = F\map($event->getGallery()->getImages(), function (GalleryImage $image) {
            $url =  $this->absoluteUrlGenerator->generateAbsoluteUrlFromRelative($image->getWebPath());

            return UrlItemData::create($url);
        });

        return GalleryImageListData::create(
            $images,
            $this->metaDataFactory->createImageGalleryMetaDataFromEvent($event)
        );
    }
}

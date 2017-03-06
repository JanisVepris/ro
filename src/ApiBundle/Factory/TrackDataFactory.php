<?php
namespace ApiBundle\Factory;

use ApiBundle\DataTransfer\Api\TrackListItemData;
use CoreBundle\Service\AbsoluteUrlGenerator;
use RoBundle\Entity\Track;

class TrackDataFactory extends AbstractApiDataFactory
{
    public function createFromEntity(Track $track)
    {
        return TrackListItemData::create(
            $track->getTitle(),
            $this->absoluteUrlGenerator->generateAbsoluteUrlFromRelative($track->getWebPath())
        );
    }
}

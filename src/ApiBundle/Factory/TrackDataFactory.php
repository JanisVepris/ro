<?php
namespace ApiBundle\Factory;

use ApiBundle\DataTransfer\Api\TrackListItemData;
use CoreBundle\Service\AbsoluteUrlGenerator;
use RoBundle\Entity\Track;

class TrackDataFactory
{
    /** @var AbsoluteUrlGenerator */
    private $absoluteUrlGenerator;

    public function __construct(AbsoluteUrlGenerator $absoluteUrlGenerator)
    {
        $this->absoluteUrlGenerator = $absoluteUrlGenerator;
    }

    public function createFromEntity(Track $track)
    {
        return TrackListItemData::create(
            $track->getTitle(),
            $this->absoluteUrlGenerator->generateAbsoluteUrlFromRelative($track->getWebPath())
        );
    }
}

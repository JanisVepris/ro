<?php
namespace ApiBundle\Factory;

use ApiBundle\DataTransfer\Api\TrackListData;
use RoBundle\Entity\Event;
use Functional as F;

class TrackListDataFactory extends AbstractApiDataFactory
{
    /** @var TrackDataFactory */
    private $trackDataFactory;

    /**
     * @param TrackDataFactory $trackDataFactory
     */
    public function __construct(TrackDataFactory $trackDataFactory)
    {
        $this->trackDataFactory = $trackDataFactory;
    }

    /**
     * @param Event $event
     * @return TrackListData
     */
    public function createFromEvent(Event $event)
    {
        return TrackListData::create(
            F\map($event->getPlaylist()->getTracks(), [$this->trackDataFactory, 'createFromEntity']),
            $this->metaDataFactory->createPlaylistMetadataFromEvent($event)
        );
    }
}

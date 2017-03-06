<?php
namespace ApiBundle\Factory;

use ApiBundle\DataTransfer\Api\VideoListData;
use ApiBundle\DataTransfer\Api\VideoListItemData;
use RoBundle\Entity\Event;
use Functional as F;

class VideoListDataFactory extends AbstractApiDataFactory
{
    public function createFromEvent(Event $event)
    {
        return VideoListData::create(
            F\map($event->getVideoPlaylist()->getVideos(), [VideoListItemData::class, 'createFromEntity']),
            $this->metaDataFactory->createVideoPlaylistMetadataFromEvent($event)
        );
    }
}

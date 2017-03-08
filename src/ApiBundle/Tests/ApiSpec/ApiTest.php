<?php
namespace ApiBundle\Tests;

use Lakion\ApiTestCase\JsonApiTestCase;
use Symfony\Bundle\FrameworkBundle\Client;

class ApiTest extends JsonApiTestCase
{
    const BASE_URI = 'http://ro.dev/api';

    /** @var Client */
    protected $client;

    private function checkEndpoint($uri, $responsePattern)
    {
        $this->client->request('GET', sprintf('%s%s', static::BASE_URI, $uri));

        $response = $this->client->getResponse();

        $this->assertResponse($response, $responsePattern);
    }

    /**
     * @dataProvider endpointDataProvider
     */
    public function testAllEndpoints($uri, $pattern)
    {
        $this->checkEndpoint($uri, $pattern);
    }

    public function endpointDataProvider()
    {
        return [
            'Event List' => ['/events', 'event_list'],
            'Single Event' => ['/events/1', 'event'],
            'Event Poster' => ['/events/1/poster', 'poster'],
            'Event Article List' => ['/events/1/articles', 'article_list'],
            'Single Article' => ['/events/1/articles/11', 'article'],
            'Audio Track List' => ['/events/1/audioPlaylist/tracks', 'track_list'],
            'Video List' => ['/events/1/videoPlaylist/videos', 'video_list'],
            'Gallery Image List' => ['/events/1/gallery/images', 'gallery_images'],
            'Event Team' => ['/events/1/team', 'team'],
            'Lyric List' => ['/events/1/lyrics', 'lyrics_list'],
            'Single Lyric' => ['/events/1/lyrics/11', 'lyric'],
            'Event Script' => ['/events/1/script', 'script'],
            'Event Facts' => ['/events/1/facts', 'facts'],
        ];
    }
}

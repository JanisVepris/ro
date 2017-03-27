<?php
namespace AdminBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\HttpFoundation\RequestStack;

class Sidebar
{
    /** @var FactoryInterface */
    private $factory;

    /** @var RequestStack */
    private $requestStack;

    public function __construct(FactoryInterface $factory, RequestStack $requestStack)
    {
        $this->factory = $factory;
        $this->requestStack = $requestStack;
    }

    public function createMainMenu(array $options)
    {
        $eventId = $this->requestStack->getCurrentRequest()->get('eventId');

        $menu = $this->factory->createItem('root');

        $menu->addChild('Roko Operos', [
            'route' => 'admin_events_list',
        ]);
        $menu->addChild('Straipsniai', [
            'route' => 'admin_articles_list',
            'routeParameters' => [
                'eventId' => $eventId
            ]
        ]);
        $menu->addChild('Plakatas', [
            'route' => 'admin_posters_show',
            'routeParameters' => [
                'eventId' => $eventId
            ]
        ]);
        $menu->addChild('Nuotraukų galerija', [
            'route' => 'admin_galleries_show',
            'routeParameters' => [
                'eventId' => $eventId
            ]
        ]);
        $menu->addChild('Audio playlist’as', [
            'route' => 'admin_playlist_show',
            'routeParameters' => [
                'eventId' => $eventId
            ]
        ]);
        $menu->addChild('Video playlist’as', [
            'route' => 'admin_video_playlists_show',
            'routeParameters' => [
                'eventId' => $eventId
            ]
        ]);
        $menu->addChild('Dainų tekstai', [
            'route' => 'admin_lyrics_show',
            'routeParameters' => [
                'eventId' => $eventId
            ]
        ]);
        $menu->addChild('Scenarijus', [
            'route' => 'admin_scripts_edit',
            'routeParameters' => [
                'eventId' => $eventId
            ]
        ]);
        $menu->addChild('Dalyviai', [
            'route' => 'admin_teams_edit',
            'routeParameters' => [
                'eventId' => $eventId
            ]
        ]);
        $menu->addChild('Įdomūs faktai', [
            'route' => 'admin_facts_edit',
            'routeParameters' => [
                'eventId' => $eventId
            ]
        ]);

        return $menu;
    }
}

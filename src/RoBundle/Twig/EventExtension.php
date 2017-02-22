<?php
namespace RoBundle\Twig;

use RoBundle\Entity\Event;

class EventExtension extends \Twig_Extension
{
    public function getName()
    {
        return 'ro_twig_event_extension';
    }

    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction('event_thumb', [$this, 'eventThumb'], [
                'needs_environment' => true,
                'is_safe' => ['html']
            ])
        ];
    }

    /**
     * @param \Twig_Environment $environment
     * @param Event $event
     * @param string $size
     * @param bool $drawCircle
     * @return string
     */
    public function eventThumb(\Twig_Environment $environment, Event $event, $size = 'small', $drawCircle = false)
    {
        if (!$event->getEventImage()) {
            return '';
        }

        return $environment->render('RoBundle:Extensions:eventThumb.html.twig', [
            'imagePath' => $event->getEventImage()->getWebPath(),
            'alt' => $event->getTitle(),
            'filter' => sprintf('event_thumb_%s', $size),
            'drawCircle' => $drawCircle,
        ]);
    }
}

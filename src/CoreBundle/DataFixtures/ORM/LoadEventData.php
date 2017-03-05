<?php
namespace CoreBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory as FakerFactory;
use RoBundle\Entity\Event;
use RoBundle\Entity\EventImage;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class LoadEventData extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
{
    /** @var ContainerInterface */
    protected $container;

    private function getEventData()
    {
        return [
            [
                'title' => 'Raudonkepuraitė',
                'refId' => 1,
            ],
            [
                'title' => 'Juodas Katinas Supermatematikas',
                'refId' => 2,
            ],
            [
                'title' => 'Byla Nr. 4',
                'refId' => 3,
            ],
            [
                'title' => 'Žaidimo Pabaiga',
                'refId' => 4,
            ],
            [
                'title' => 'EM\'FIVA',
                'refId' => 5,
            ],
            [
                'title' => 'Pradžių Pradžia',
                'refId' => 6,
            ],
            [
                'title' => 'New Gardukas',
                'refId' => 7,
            ],
            [
                'title' => 'Amžinoji Žiemos Sesija',
                'refId' => 8,
            ],
            [
                'title' => 'Visorių Sindromas',
                'refId' => 9,
            ],
            [
                'title' => 'Teatromatika',
                'refId' => 10,
            ],
            [
                'title' => 'Viduramžiai Rytoj',
                'refId' => 11,
            ],
            [
                'title' => '404: Rojus Nerastas',
                'refId' => 12,
            ],
            [
                'title' => 'Dievas Iš Mašinos',
                'refId' => 13,
            ],
            [
                'title' => 'Naktis, Kai Sustojo Malūnas',
                'refId' => 14,
            ],
            [
                'title' => 'ProtoTipas',
                'refId' => 15,
            ],
            [
                'title' => 'Roko Opera 2017',
                'refId' => 16,
            ],
            [
                'title' => 'Raudonkepuraitė',
                'refId' => 17,
            ],
        ];
    }

    public function load(ObjectManager $manager)
    {
        $faker = FakerFactory::create('lt_LT');
        $uploadableManager = $this->container->get('stof_doctrine_extensions.uploadable.manager');

        $events = $this->getEventData();
        $eventCount = count($events);

        foreach ($events as $eventData) {
            $event = new Event();

            $path = $faker->image(sys_get_temp_dir(), 300, 300, 'cats');
            $eventImage = new EventImage();
            $eventImage
                ->setFile(new UploadedFile($path, $path))
                ->setAsFixture();

            $event
                ->setTitle($eventData['title'])
                ->setDescription($faker->text(400))
                ->setEventDate(new \DateTime(sprintf('-%d years', $eventCount--)))
                ->setEventImage($eventImage);

            $uploadableManager->markEntityToUpload($event->getEventImage(), $event->getEventImage()->getFile());

            $manager->persist($event);

            $this->addReference(sprintf('ro_event_%d', $eventData['refId']), $event);
        }

        $manager->flush();
    }

    public function getOrder()
    {
        return 2;
    }

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }
}

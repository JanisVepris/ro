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
    /**
     * @var ContainerInterface
     */
    protected $container;

    private function getEventTitles()
    {
        return [
            'Raudonkepuraitė',
            'Juodas Katinas Supermatematikas',
            'Felixo Katinai',
            'Byla Nr. 4',
            'Žaidimo Pabaiga',
            'EM\'FIVA',
            'Pradžių Pradžia',
            'New Gardukas',
            'Amžinoji Žiemos Sesija',
            'Visorių Sindromas',
            'Teatromatika',
            'Viduramžiai Rytoj',
            '404: Rojus Nerastas',
            'Dievas Iš Mašinos',
            'Naktis, Kai Sustojo Malūnas',
            'ProtoTipas',
            'Roko Opera 2017',
        ];
    }

    public function load(ObjectManager $manager)
    {
        $faker = FakerFactory::create('lt_LT');
        $uploadableManager = $this->container->get('stof_doctrine_extensions.uploadable.manager');

        $eventTitles = $this->getEventTitles();

        foreach ($eventTitles as $eventTitle) {
            $event = new Event();

            $path = $faker->image(sys_get_temp_dir(), 300, 300, 'cats');
            $eventImage = new EventImage();
            $eventImage->setFile(new UploadedFile($path, $path));

            $event
                ->setTitle($eventTitle)
                ->setEventDate($faker->unique()->dateTimeBetween('-19 years'))
                ->setEventImage($eventImage);

            $uploadableManager->markEntityToUpload($event->getEventImage(), $event->getEventImage()->getFile());
            $manager->persist($event);
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

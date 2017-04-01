<?php
namespace CoreBundle\DataFixtures\ORM;

use CoreBundle\DataFixtures\AccessTrait;
use CoreBundle\DataFixtures\IdAssignmentTrait;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory as FakerFactory;
use Faker\Generator;
use RoBundle\Entity\Event;
use RoBundle\Entity\EventImage;
use RoBundle\Entity\Facts;
use RoBundle\Entity\Gallery;
use RoBundle\Entity\GalleryImage;
use RoBundle\Entity\Lyric;
use RoBundle\Entity\Lyrics;
use RoBundle\Entity\Playlist;
use RoBundle\Entity\Poster;
use RoBundle\Entity\Script;
use RoBundle\Entity\Team;
use RoBundle\Entity\Track;
use RoBundle\Entity\Video;
use RoBundle\Entity\VideoPlaylist;
use Stof\DoctrineExtensionsBundle\Uploadable\UploadableManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class LoadEventData extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
{
    use IdAssignmentTrait;
    use AccessTrait;
    /** @var ContainerInterface */
    protected $container;

    /** @var Generator */
    private $faker;

    /** @var UploadableManager */
    private $uploadableManager;

    public function load(ObjectManager $manager)
    {
        $this->em = $manager;
        $this->allowIdAssignment(Event::class);
        $this->allowIdAssignment(Lyric::class);
        $this->faker = FakerFactory::create('lt_LT');
        $this->uploadableManager = $this->container->get('stof_doctrine_extensions.uploadable.manager');

        $events = $this->getEventData();

        foreach ($events as $eventData) {
            $event = $this->createEvent($eventData);
            $eventImage = $this->createEventImage();
            $poster = $this->createEventPoster();
            $playlist = $this->createAudioPlaylist($event);
            $videoPlaylist = $this->createVideoPlaylist($event);
            $imageGallery = $this->createImageGallery($event);
            $team = $this->createTeam();
            $lyrics = $this->createLyrics($eventData);
            $facts = $this->createFacts();
            $script = $this->createScript();

            $event
                ->setEventImage($eventImage)
                ->setPoster($poster)
                ->setPlaylist($playlist)
                ->setVideoPlaylist($videoPlaylist)
                ->setGallery($imageGallery)
                ->setTeam($team)
                ->setLyrics($lyrics)
                ->setFacts($facts)
                ->setScript($script);

            $this->uploadableManager->markEntityToUpload($event->getEventImage(), $event->getEventImage()->getFile());
            $this->uploadableManager->markEntityToUpload($event->getPoster(), $event->getPoster()->getFile());

            $this->setNonPublicProperty($event, 'id', $eventData['refId'], Event::class);
            $this->addReference(sprintf('ro_event_%d', $eventData['refId']), $event);

            $manager->persist($event);
            $manager->flush();
        }

        $this->resetIdAssignment(Event::class);
        $this->resetIdAssignment(Lyric::class);
    }

    public function getOrder()
    {
        return 2;
    }

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    public function createScript()
    {
        $script = new Script();
        $script->setContent($this->faker->paragraph(5, true));

        return $script;
    }

    private function createFacts()
    {
        $facts = new Facts();
        $facts->setContent($this->faker->paragraphs(5, true));

        return $facts;
    }

    private function createLyrics(array $eventData)
    {
        $lyrics = new Lyrics();

        for ($i = 1; $i <= 4; $i++) {
            $lyric = new Lyric();
            $lyric
                ->setTitle($this->faker->sentence(2))
                ->setContent($this->faker->paragraphs(4, true));

            $this->setNonPublicProperty($lyric, 'id', sprintf('%d%d', $eventData['refId'], $i), Lyric::class);

            $lyrics->addLyric($lyric);
        }

        return $lyrics;
    }

    private function createTeam()
    {
        $team = new Team();
        $team->setContent($this->faker->paragraph(4));

        return $team;
    }

    private function createEvent(array $eventData)
    {
        $event = new Event();
        $event
            ->setTitle($eventData['title'])
            ->setDescription($this->faker->text(400))
            ->setEventDate(new \DateTime(sprintf('-%d years', $eventData['refId'])));

        return $event;
    }

    private function createImageGallery(Event $event)
    {
        $galleryImages = [
            __DIR__ . '/../Files/images/gallery1.jpg',
            __DIR__ . '/../Files/images/gallery2.jpg',
            __DIR__ . '/../Files/images/gallery3.jpg',
            __DIR__ . '/../Files/images/gallery4.jpg',
            __DIR__ . '/../Files/images/gallery5.jpg',
            __DIR__ . '/../Files/images/gallery6.jpg',
            __DIR__ . '/../Files/images/gallery7.jpg',
            __DIR__ . '/../Files/images/gallery8.jpg',
            __DIR__ . '/../Files/images/gallery9.jpg',
            __DIR__ . '/../Files/images/gallery10.jpg',
            __DIR__ . '/../Files/images/gallery11.jpg',
            __DIR__ . '/../Files/images/gallery12.jpg',
            __DIR__ . '/../Files/images/gallery13.jpg',
        ];

        $gallery = new Gallery();
        $gallery->setEvent($event);

        for ($i = 1; $i <= 15; $i++) {
            $path = $galleryImages[array_rand($galleryImages)];

            $galleryImage = new GalleryImage();
            $galleryImage
                ->setFile(new UploadedFile($path, $path))
                ->setAsFixture();

            $this->uploadableManager->markEntityToUpload($galleryImage, $galleryImage->getFile());

            $gallery->addImage($galleryImage);
        }

        return $gallery;
    }

    private function createAudioPlaylist(Event $event)
    {
        $trackPath = __DIR__ . '/../Files/mp3/AudioTrack.mp3';
        $playlist = new Playlist();

        $playlist->setEvent($event);

        $track = new Track();
        $track
            ->setPlaylist($playlist)
            ->setTitle($this->faker->sentence(2))
            ->setFile(new UploadedFile($trackPath, $trackPath))
            ->setAsFixture();

        $this->uploadableManager->markEntityToUpload($track, $track->getFile());

        $playlist->addTrack($track);

        $track = new Track();
        $track
            ->setPlaylist($playlist)
            ->setTitle($this->faker->sentence(2))
            ->setFile(new UploadedFile($trackPath, $trackPath))
            ->setAsFixture();

        $this->uploadableManager->markEntityToUpload($track, $track->getFile());

        $playlist->addTrack($track);

        return $playlist;
    }

    private function createVideoPlaylist(Event $event)
    {
        $playlist = new VideoPlaylist();
        $playlist->setEvent($event);

        $video = new Video();
        $video
            ->setVideoPlaylist($playlist)
            ->setTitle($this->faker->sentence(2))
            ->setUrl('https://www.youtube.com/watch?v=gHxvP7Sxyrw');

        $playlist->addVideo($video);

        $video = new Video();
        $video
            ->setVideoPlaylist($playlist)
            ->setTitle($this->faker->sentence(2))
            ->setUrl('https://www.youtube.com/watch?v=gHxvP7Sxyrw');

        $playlist->addVideo($video);

        return $playlist;
    }

    private function createEventImage()
    {
        $coverImages = [
            __DIR__ . '/../Files/images/cover1.png',
            __DIR__ . '/../Files/images/cover2.png',
        ];

        $path = $coverImages[array_rand($coverImages)];

        $eventImage = new EventImage();
        $eventImage
            ->setFile(new UploadedFile($path, $path))
            ->setAsFixture();

        return $eventImage;
    }

    private function createEventPoster()
    {
        $path = __DIR__ . '/../Files/images/poster1.jpg';

        $poster = new Poster();
        $poster
            ->setFile(new UploadedFile($path, $path))
            ->setAsFixture();

        return $poster;
    }

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
        ];
    }
}

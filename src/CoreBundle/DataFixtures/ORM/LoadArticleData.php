<?php
namespace CoreBundle\DataFixtures\ORM;

use CoreBundle\DataFixtures\AccessTrait;
use CoreBundle\DataFixtures\IdAssignmentTrait;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use RoBundle\Entity\Article;
use Faker\Factory as FakerFactory;
use RoBundle\Entity\ArticleImage;
use RoBundle\Entity\Event;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class LoadArticleData extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
{
    use IdAssignmentTrait;
    use AccessTrait;

    /** @var ContainerInterface */
    protected $container;

    public function load(ObjectManager $manager)
    {
        $this->em = $manager;
        $this->allowIdAssignment(Article::class);
        $faker = FakerFactory::create();
        $uploadableManager = $this->container->get('stof_doctrine_extensions.uploadable.manager');
        $events = $this->getEvents();

        foreach ($events as $event) {
            for ($i = 1; $i < 7; $i++) {
                // Create an image for the article
                $path = __DIR__ . '/../Files/images/article1.jpg';
                $articleImage = new ArticleImage();
                $articleImage
                    ->setFile(new UploadedFile($path, $path))
                    ->setAsFixture();

                // Create the article
                $article = new Article();
                $article
                    ->setEvent($event)
                    ->setTitle($faker->sentence(10))
                    ->setDescription($faker->text(400))
                    ->setContent($faker->paragraphs(4, true))
                    ->setPublished(true)
                    ->setArticleImage($articleImage);

                $uploadableManager->markEntityToUpload($articleImage, $articleImage->getFile());

                $this->setNonPublicProperty($article, 'id', (int) sprintf('%d%d', $event->getId(), $i), Article::class);

                $manager->persist($article);
                $manager->flush();
            }

            $this->resetIdAssignment(Article::class);
        }
    }

    /**
     * @return Event[]
     */
    private function getEvents()
    {
        $events = [];
        for ($i = 1; $i <= 16; $i++) {
            $events[] = $this->getReference('ro_event_' . $i);
        }

        return $events;
    }

    public function getOrder()
    {
        return 3;
    }

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }
}

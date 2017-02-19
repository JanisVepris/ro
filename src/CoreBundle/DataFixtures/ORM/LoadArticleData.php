<?php
namespace CoreBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use RoBundle\Entity\Article;
use Faker\Factory as FakerFactory;
use RoBundle\Entity\ArticleImage;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class LoadArticleData extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
{
    /** @var ContainerInterface */
    protected $container;

    public function load(ObjectManager $manager)
    {
        $faker = FakerFactory::create('lt_LT');
        $uploadableManager = $this->container->get('stof_doctrine_extensions.uploadable.manager');
        $events = $this->getEvents();

        foreach ($events as $event) {
            for ($i = 1; $i < 7; $i++) {
                // Create an image for the article
                $path = $faker->image(sys_get_temp_dir(), 500, 500, 'fashion');
                $articleImage = new ArticleImage();
                $articleImage
                    ->setFile(new UploadedFile($path, $path))
                    ->setAsFixture();

                // Create the article
                $article = new Article();
                $article
                    ->setEvent($event)
                    ->setTitle($faker->sentence(10))
                    ->setDescription($faker->paragraph(4))
                    ->setContent($faker->paragraphs(4, true))
                    ->setPublished(true)
                    ->setArticleImage($articleImage);

                $uploadableManager->markEntityToUpload($articleImage, $articleImage->getFile());
                $manager->persist($article);
            }

            $manager->flush();
        }
    }

    private function getEvents()
    {
        $events = [];
        for ($i = 1; $i <= 17; $i++) {
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
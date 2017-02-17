<?php
namespace CoreBundle\DataFixtures\ORM;

use CoreBundle\Entity\User;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadUserData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $superAdmin = new User();
        $superAdmin
            ->setUsername('ro.admin@midi.lt')
            ->setEmail('ro.admin@midi.lt')
            ->setPassword('12345')
            ->addRole(User::ROLE_SUPER_ADMIN);

        $manager->persist($superAdmin);
        $manager->flush();
    }

    public function getOrder()
    {
        return 1;
    }
}

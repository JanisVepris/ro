<?php
namespace CoreBundle\DataFixtures\ORM;

use CoreBundle\DataFixtures\AccessTrait;
use CoreBundle\DataFixtures\IdAssignmentTrait;
use CoreBundle\Entity\User;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadUserData extends AbstractFixture implements OrderedFixtureInterface
{
    use IdAssignmentTrait;
    use AccessTrait;

    public function load(ObjectManager $manager)
    {
        $this->em = $manager;

        $this->allowIdAssignment(User::class);

        $superAdmin = new User();
        $superAdmin
            ->setUsername('admin')
            ->setFirstName('Janis')
            ->setLastName('Vepris')
            ->setEmail('ro.admin@midi.lt')
            ->setPlainPassword('12345')
            ->setEnabled(true)
            ->addRole(User::ROLE_SUPER_ADMIN);

        $this->setNonPublicProperty($superAdmin, 'id', 1, User::class);
        $manager->persist($superAdmin);
        $manager->flush();
        $this->resetIdAssignment(User::class);
    }

    public function getOrder()
    {
        return 1;
    }
}

<?php
namespace CoreBundle\DataFixtures;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Id\AssignedGenerator;
use Doctrine\ORM\Mapping\ClassMetadata;

trait IdAssignmentTrait
{
    /** @var array */
    private $originalPersisters = [];

    private $originalGenerators = [];

    private $originalGeneratorTypes = [];

    /** @var EntityManager */
    private $em;

    /**
     * Allow setting the id value for Entities with Automated Id Generators (e.g. Auto Increment)
     *
     * @param string $className
     */
    public function allowIdAssignment($className)
    {
        /** @var EntityManager $em */
        $em = $this->getObjectManager();

        $unitOfWork = $this->getNonPublicProperty($em, 'unitOfWork');
        $persisters = $this->getNonPublicProperty($unitOfWork, 'persisters');
        $this->originalPersisters[$className] = isset($persisters[$className]) ? $persisters[$className] : null;
        unset($persisters[$className]);
        $this->setNonPublicProperty($unitOfWork, 'persisters', $persisters);
        $this->setNonPublicProperty($em, 'unitOfWork', $unitOfWork);

        $activityGroupClassMetadata = $em->getClassMetadata($className);
        $this->originalGeneratorTypes[$className] = $activityGroupClassMetadata->generatorType;
        $this->originalGenerators[$className] = $activityGroupClassMetadata->idGenerator;
        $activityGroupClassMetadata->setIdGeneratorType(ClassMetadata::GENERATOR_TYPE_NONE);
        $activityGroupClassMetadata->setIdGenerator(new AssignedGenerator());
    }

    /**
     * Reset Id Generator status to the original value when done with this Entity
     *
     * @param string $className
     */
    public function resetIdAssignment($className)
    {
        /** @var EntityManager $em */
        $em = $this->getObjectManager();

        $unitOfWork = $this->getNonPublicProperty($em, 'unitOfWork');
        $persisters = $this->getNonPublicProperty($unitOfWork, 'persisters');
        $persisters[$className] = $this->originalPersisters[$className];
        $this->setNonPublicProperty($unitOfWork, 'persisters', $persisters);
        $this->setNonPublicProperty($em, 'unitOfWork', $unitOfWork);

        $activityGroupClassMetadata = $em->getClassMetadata($className);
        $activityGroupClassMetadata->setIdGeneratorType($this->originalGeneratorTypes[$className]);
        $activityGroupClassMetadata->setIdGenerator($this->originalGenerators[$className]);
    }

    private function getObjectManager()
    {
        return $this->em;
    }
}

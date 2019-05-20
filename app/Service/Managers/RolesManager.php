<?php


namespace App\Service\Managers;


use App\Models\User;
use App\Service\Persistence\RegistryInterface;
use Doctrine\ORM\EntityManager;

/**
 * @property EntityManager entityManager
 */
class RolesManager implements ManagerInterface
{

    const ANONYMOUS = "Anonymous";
    const READER = "Reader";
    const WRITER = "Writer";
    const ADMIN = "Admin";

    public function __construct(RegistryInterface $registry)
    {
        $this->entityManager = $registry->getEntityManager();
    }

    public function add($object)
    {
        $this->entityManager->persist($object);
        $this->entityManager->flush();
        return $object;
    }

    public function edit($object)
    {
        // TODO: Implement edit() method.
    }

    public function remove($object)
    {
        // TODO: Implement remove() method.
    }


}

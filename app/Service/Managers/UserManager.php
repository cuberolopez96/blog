<?php


namespace App\Service\Managers;


use App\Models\User;
use App\Service\Persistence\RegistryInterface;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;

/**
 * @property EntityManager entityManager
 */
class UserManager implements ManagerInterface
{
    public function __construct(RegistryInterface $registry)
    {
        $this->entityManager = $registry->getEntityManager();
    }

    /**
     * @param User $object
     * @return User
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add($object)
    {
        $object->setPassword(password_hash($object->getPassword(),PASSWORD_BCRYPT));
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

    public function erase_credentials(User $user,$action)
    {
        return $user->getRol()->{"get".$action}()==1;
    }
}

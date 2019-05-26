<?php


namespace App\Service\Managers;


use App\Models\ModelInterface;
use App\Models\User;
use App\Service\Persistence\RegistryInterface;
use App\Validators\ValidatorInterface;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;

/**
 * @property EntityManager entityManager
 * @property ValidatorInterface validator
 */
class UserManager implements ManagerInterface
{
    public function __construct(RegistryInterface $registry, ValidatorInterface $validator)
    {
        $this->entityManager = $registry->getEntityManager();
        $this->validator = $validator;
    }

    /**
     * @param array $params
     * @return void
     */
    public function add(array $params)
    {



    }

    public function edit(array $params)
    {
        // TODO: Implement edit() method.
    }

    public function remove(array $params)
    {
        // TODO: Implement remove() method.
    }


    public function save(ModelInterface $model)
    {
        $this->entityManager->persist($model);
        $this->entityManager->flush();
        $this->entityManager->clear();
    }
}

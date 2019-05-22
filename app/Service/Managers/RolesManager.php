<?php


namespace App\Service\Managers;


use App\Models\ModelInterface;
use App\Models\Rol;
use App\Models\User;
use App\Service\Persistence\RegistryInterface;
use App\Validators\ValidatorInterface;
use Doctrine\ORM\EntityManager;
use http\Exception\RuntimeException;

/**
 * @property EntityManager entityManager
 * @property ValidatorInterface validator
 */
class RolesManager implements ManagerInterface
{

    const ANONYMOUS = "Anonymous";
    const READER = "Reader";
    const WRITER = "Writer";
    const ADMIN = "Admin";
    const PARAM_NAME = 'name';
    const PARAM_NUMORDER = 'numOrder';

    public function __construct(RegistryInterface $registry,ValidatorInterface $validator)
    {
        $this->entityManager = $registry->getEntityManager();
        $this->validator = $validator;
    }

    public function add(array $param)
    {
        $rol = new Rol();
        $rol->setName(array_key_exists(self::PARAM_NAME,$param)?$param[self::PARAM_NAME]:null);
        $rol->setNumorder(array_key_exists(self::PARAM_NUMORDER,$param)?$param[self::PARAM_NUMORDER]:0);
        if(!$this->validator->validate($rol)){
            throw new \RuntimeException(implode("\n", $this->validator->getErrors()));
        }
        $this->save($rol);
//
//        $this->entityManager->persist($object);
//        $this->entityManager->flush();
//        return $object;
    }

    public function edit(array $param)
    {
        // TODO: Implement edit() method.
    }

    public function remove(array $param)
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

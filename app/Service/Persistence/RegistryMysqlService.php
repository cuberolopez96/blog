<?php

namespace App\Service\Persistence;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;

/**
 * @property EntityManager entityManager
 */
class RegistryMysqlService implements RegistryInterface
{
    /**
     * RegistryMysqlService constructor.
     * @param $driver
     * @param $host
     * @param $user
     * @param $password
     * @param $dbname
     * @throws \Doctrine\ORM\ORMException
     */
    public function __construct($driver,$host,$user,$password,$dbname)
    {
        $conn = array(
          "driver"=>$driver ,
          "host"=>$host,
          "user"=>$user,
          "password"=>$password,
          "dbname"=>$dbname,
        );
        $config = Setup::createAnnotationMetadataConfiguration(array("../app/Models"));

        $this->entityManager = EntityManager::create($conn,$config);
    }

    public function getEntityManager(){
        return $this->entityManager;
    }

}

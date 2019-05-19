<?php

namespace App\Service\Persistence;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;

/**
 * @property EntityManager entityManager
 * @property string pathModels
 * @property array conn
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
        $this->pathModels = "../app/Models";
        $this->conn = array(
          "driver"=>$driver ,
          "host"=>$host,
          "user"=>$user,
          "password"=>$password,
          "dbname"=>$dbname,
        );
        $config = Setup::createAnnotationMetadataConfiguration(array($this->pathModels));

        $this->entityManager = EntityManager::create($this->conn,$config);
    }

    public function getEntityManager(){
        return $this->entityManager;
    }

    public function setSourceManager($pathModels){
        $this->pathModels = $pathModels;
        $config = Setup::createAnnotationMetadataConfiguration(array($this->pathModels));
        $this->entityManager = EntityManager::create($this->conn,$config);
    }

}

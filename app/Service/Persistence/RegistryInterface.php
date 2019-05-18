<?php
namespace  App\Service\Persistence;

use Doctrine\ORM\EntityManager;

interface RegistryInterface{

    /**
     * @return EntityManager
     */
    public function getEntityManager();
}

<?php


namespace App\Service\Managers;


use App\Models\User;
use App\Service\Persistence\RegistryInterface;

interface ManagerInterface
{
    public function __construct(RegistryInterface $registry);

    public function add($object);
    public function edit($object);
    public function remove($object);
}

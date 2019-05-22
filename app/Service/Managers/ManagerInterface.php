<?php


namespace App\Service\Managers;


use App\Models\ModelInterface;
use App\Models\User;
use App\Service\Persistence\RegistryInterface;
use App\Validators\ValidatorInterface;

interface ManagerInterface
{
    public function __construct(RegistryInterface $registry, ValidatorInterface $validator);

    public function add(array $param);
    public function edit(array $param);
    public function remove(array $param);
    public function save(ModelInterface $model);
}

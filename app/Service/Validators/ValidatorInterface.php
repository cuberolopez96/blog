<?php

namespace App\Validators;

use App\Models\ModelInterface;

interface ValidatorInterface
{
    public function __construct();


    public function validate(ModelInterface $model);

    public function getErrors();

}

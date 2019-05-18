<?php

namespace App\Validators;

use Symfony\Component\Validator\Validator\ValidatorInterface as Validator;

interface ValidatorInterface
{
    public function __construct(Validator $validation);


    public function validate($object);

    public function getErrors();

}

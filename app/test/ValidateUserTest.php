<?php


namespace App\test;


use App\Models\User;
use App\Validators\UserValidator;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Validator\Validation;

class ValidateUserTest extends TestCase
{
    public function testWrongPasswordUser(){
        $user = new User();
        $user->setUsername("juan");
        $validation = new UserValidator(Validation::createValidator());
        $this->assertFalse($validation->validate($user));
    }
    public function testWrongUsernameUser(){
        $user = new User();
        $user->setPassword("hola");
        $validation = new UserValidator(Validation::createValidator());
        $validate = $validation->validate($user);
        $this->assertFalse($validate);
    }

    public function testSuccessUser(){
        $user = new User();
        $user->setUsername("Juan");
        $user->setPassword("Hola");
        $validation = new UserValidator(Validation::createValidator());
        $validate = $validation->validate($user);
        $this->assertTrue($validate);
    }
}

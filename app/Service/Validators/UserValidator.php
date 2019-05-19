<?php


namespace App\Validators;




use App\Models\User;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Validator\ValidatorInterface as Validator;

/**
 * @property Validator $validator
 * @property array errors
 */
class UserValidator implements ValidatorInterface
{


    public function __construct(Validator $validation)
    {
        $this->validator = $validation;
        $this->errors = 0;
    }

    /**
     * @param User $user
     * @return mixed
     */
    public function validate($user)
    {
        $this->errors = 0;

        $constraintViolationUsername = $this->validateUsername($user);
        if(count($constraintViolationUsername) >= 0){
                $this->errors += count($constraintViolationUsername);
        }

        $constraintViolationPassword = $this->validatePassword($user);
        if(count($constraintViolationPassword)>=0){
            $this->errors += count($constraintViolationPassword) ;

        }

        return $this->errors == 0;
    }

    public function getErrors()
    {
        return $this->errors;
    }

    private function validateUsername(User $user)
    {
        $username = $user->getUsername();

        return $this->validator->validate($username,array(
           new NotBlank(),
            new NotNull()
        ));

    }
    private function validatePassword(User $user){
        $password = $user->getPassword();
        return $this->validator->validate($password,array(
            new NotBlank(),
            new Length([
                'min'=>1
            ])
        ));
    }


}

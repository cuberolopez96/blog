<?php


namespace App\Validators;




use App\Models\ModelInterface;
use App\Models\User;
use Symfony\Component\Validator\Validator\ValidatorInterface as Validator;

/**
 * @property Validator $validator
 * @property array errors
 */
class UserValidator implements ValidatorInterface
{


    const ERROR_NAME_EMPTY = "The name is Empty";
    const ERROR_PASSWORD_EMPTY = "The password is Empty";
    const ERROR_PASSWORD_LENGTH = "The minimum password's length is 8 characters";

    public function __construct()
    {
        $this->errors = 0;
    }

    /**
     * @param ModelInterface $model
     * @return mixed
     */
    public function validate(ModelInterface $model)
    {
        $this->errors = 0;



        return $this->errors == 0;
    }

    public function getErrors()
    {
        return $this->errors;
    }

    private function validateUsername(User $user, array &$errors)
    {
        $name = $user->getName();
        if(!$name || $name == "")
        {
            array_push($errors, self::ERROR_NAME_EMPTY);
        }
        return $errors;

    }
    private function validatePassword(User $user, array &$errors){
        $password = $user->getPassword();
        if(!$password || $password == ""){
            array_push($errors, self::ERROR_PASSWORD_EMPTY);
        }
        if(strlen($password)<8){
            array_push($errors, self::ERROR_PASSWORD_LENGTH);
        }
        //TODO prueba
    }


}

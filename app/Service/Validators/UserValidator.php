<?php


namespace App\Validators;




use App\Models\User;
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
        $this->errors = array();
    }

    /**
     * @param User $user
     * @return mixed
     */
    public function validate($user)
    {
        $this->errors = 0;

        if(count($this->validateUsername($user)) >= 0){

        }
        
        return ;
    }

    public function getErrors()
    {
        // TODO: Implement getErrors() method.
    }

    private function validateUsername(User $user)
    {
        $username = $user->getUsername();

        return $this->validator->validate($username,array(
            //TODO put validations
        ));
    }


}

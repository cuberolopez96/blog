<?php


namespace App\Service\Validators;


use App\Models\ModelInterface;
use App\Models\Rol;
use App\Validators\ValidatorInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface as Validator;

/**
 * @property Validator validator
 * @property array $errors
 */
class RolValidator implements ValidatorInterface
{

    const ERROR_EMPTY_NAME = "The name is empty";
    const ERROR_EMPTY_PRODUCT = "The NumOrder is Empty";

    public function __construct()
    {
        $this->errors = array();
    }

    public function validate(ModelInterface $model): bool
    {
        $this->errors = array();
        $this->validateName($model, $this->errors);
        $this->validateNumOrder($model, $this->errors);
        return count($this->errors)==0;
    }

    public function getErrors(): array
    {
        return $this->errors;
    }

    private function validateName(Rol $rol, &$errors)
    {
        $name = $rol->getName();
        if (!$name || $name === ""){
            array_push($errors, self::ERROR_EMPTY_NAME);
        }
        return $errors;

    }

    private function validateNumOrder(Rol $model, &$errors)
    {
        $numOrder = $model->getNumorder();
        if(!$numOrder || $numOrder === 0){
            array_push($errors, self::ERROR_EMPTY_PRODUCT);
        }

    }
}

<?php


namespace App\Service\Container;


use App\Service\Managers\RolesManager;
use App\Service\Managers\UserManager;
use App\Service\Persistence\RegistryMysqlService;
use App\Service\Validators\RolValidator;
use App\Validators\UserValidator;
use http\Exception\RuntimeException;
use Symfony\Component\Validator\Validation;

/**
 * @property array services
 */
class ContainerService implements ContainerInterface
{

    private static $INSTANCE;

    public function __construct()
    {
        $this->services= array();
        $this->services["doctrine"] = new RegistryMysqlService(
            $_ENV['DB_DRIVER'],
            $_ENV['DB_HOST'],
            $_ENV['DB_USER'],
            $_ENV['DB_PASSWORD'],
            $_ENV['DB_NAME']
        );
        // Declaring Validators
        $this->services["userValidator"] = new UserValidator();
        $this->services["rolValidator"] = new RolValidator();
        $this->services["userManager"] = new UserManager($this->get("doctrine"), $this->get("userValidator"));
        $this->services["rolesManager"] = new RolesManager($this->get("doctrine"), $this->get("rolValidator"));
    }

    public function get(string $index)
    {
        if(!array_key_exists($index,$this->services)){
            throw new RuntimeException("Service Not Found");
        }
        return $this->services[$index];
    }

    public static function getContainer()
    {
        if(null == self::$INSTANCE){
            self::$INSTANCE = new ContainerService();
        }
        return self::$INSTANCE;
    }
}

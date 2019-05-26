<?php


namespace App\Service\Security;


use App\Models\User;
use App\Service\Managers\RolesManager;
use Symfony\Component\HttpFoundation\Session\Session;

/**
 * @property Session session
 */
class AuthService
{
    public function __construct()
    {
        $this->session = new Session();
    }

    public function checkPermission($rol)
    {
        if($rol == RolesManager::ANONYMOUS){
            return true;
        }
        if(!$this->session->has('user')){

            return false;
        }
        if(gettype($this->session->get('user'))== User::class){
            return false;
        }
        /**
         * @var User $user
         */
        $user = $this->session->get('user');
        if ($user->getRol() !=$rol){
            return false;
        }
        return true;

    }

}

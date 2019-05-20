<?php
namespace App\Commands;

use App\Models\Rol;
use App\Service\Managers\RolesManager;
use App\Service\Persistence\RegistryMysqlService;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class InsertRolesCommand extends Command
{
    protected static $defaultName = 'insert-roles';
    protected function execute(InputInterface $input, OutputInterface $output)
    {

        $registry = new RegistryMysqlService(
            $_ENV['DB_DRIVER'],
            $_ENV['DB_HOST'],
            $_ENV['DB_USER'],
            $_ENV['DB_PASSWORD'],
            $_ENV['DB_NAME']
        );
        $rolesManager = new RolesManager($registry);

        $this->addRol($rolesManager, RolesManager::ANONYMOUS, 25);
        $this->addRol($rolesManager, RolesManager::READER, 50);
        $this->addRol($rolesManager, RolesManager::WRITER, 75);
        $this->addRol($rolesManager, RolesManager::ADMIN, 100);


    }

    /**
     * @param RolesManager $rolesManager
     * @param $name
     * @param $order
     */
    protected function addRol(RolesManager $rolesManager, $name, $order)
    {
        $rol = new Rol();
        $rol->setName($name);
        $rol->setNumorder($order);
        $rolesManager->add($rol);
    }

}

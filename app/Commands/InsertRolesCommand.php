<?php
namespace App\Commands;

use App\Models\Rol;
use App\Service\Container\ContainerService;
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


        $containerService = ContainerService::getContainer();
        $rolesManager = $containerService->get("rolesManager");

        try{
            $this->addRol($rolesManager, RolesManager::ANONYMOUS, 25);
            $this->addRol($rolesManager, RolesManager::READER, 50);
            $this->addRol($rolesManager, RolesManager::WRITER, 75);
            $this->addRol($rolesManager, RolesManager::ADMIN, 100);
        }catch (\Exception $e){
            $output->writeln($e->getMessage());
            $output->writeln($e->getFile());
            $output->writeln($e->getLine());
        }


    }

    /**
     * @param RolesManager $rolesManager
     * @param $name
     * @param $order
     */
    protected function addRol(RolesManager $rolesManager, $name, $order)
    {

        $rolesManager->add(array(
            RolesManager::PARAM_NAME=>$name,
            RolesManager::PARAM_NUMORDER=>$order
        ));
    }

}

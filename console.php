<?php
require_once 'vendor/autoload.php';

use App\Commands\InsertRolesCommand;
use Symfony\Component\Console\Application;
use Symfony\Component\Dotenv\Dotenv;


$dotEnv = new Dotenv();
$dotEnv->load('.env');
$application = new Application();

$application->add(new InsertRolesCommand());
$application->run();

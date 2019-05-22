<?php

use App\Controllers\DefaultController;
use App\Controllers\LoginController;
use App\Service\Managers\RolesManager;
use App\Service\Persistence\RegistryMysqlService;
use Symfony\Component\Dotenv\Dotenv;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

require_once "../vendor/autoload.php";

$dotEnv = new Dotenv();
$dotEnv->load('../.env');

$request = Request::createFromGlobals();
$router = new RouteCollection();
$router->add("main",new Route('/',array(
    "_controller"=>DefaultController::class,
    "_action"=> "index",
    "_role"=>RolesManager::ANONYMOUS
)));
$router->add("login",new Route('/login',array(
    "_controller"=>LoginController::class,
    "_action"=>"index",
    "_roles"=>RolesManager::ANONYMOUS)));
$router->add("register", new Route("/register",array(
    "_controller"=>LoginController::class,
    "_action"=>"register",
    "_roles"=>RolesManager::ANONYMOUS
)));

$context = new RequestContext();
$context->fromRequest($request);
$match = new UrlMatcher($router,$context);
$parameters = $match->match($context->getPathInfo());

$controller = new $parameters["_controller"](new RegistryMysqlService(
    $_ENV['DB_DRIVER'],
    $_ENV['DB_HOST'],
    $_ENV['DB_USER'],
    $_ENV['DB_PASSWORD'],
    $_ENV['DB_NAME']
));
echo $controller->{$parameters["_action"]}($request);


<?php

use App\Controllers\AdminController;
use App\Controllers\DefaultController;
use App\Controllers\LoginController;
use App\Service\Container\ContainerService;
use App\Service\Managers\RolesManager;
use App\Service\Persistence\RegistryMysqlService;
use App\Service\Security\AuthService;
use Symfony\Component\Dotenv\Dotenv;
use Symfony\Component\HttpFoundation\RedirectResponse;
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
    "_roles"=>RolesManager::ANONYMOUS
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
$router->add("admin", new Route("/admin",array(
    "_controller"=>AdminController::class,
    "_action" => "index",
    "_roles"=>RolesManager::ADMIN
)));

$context = new RequestContext();
$context->fromRequest($request);
$match = new UrlMatcher($router,$context);
$parameters = $match->match($context->getPathInfo());
$container = ContainerService::getContainer();
/**
 * @var AuthService $authService
 */
$authService = $container->get('authService');
if(!$authService->checkPermission($parameters["_roles"])){
    header("Location: /login");
    return;
}
$controller = new $parameters["_controller"](new RegistryMysqlService(
    $_ENV['DB_DRIVER'],
    $_ENV['DB_HOST'],
    $_ENV['DB_USER'],
    $_ENV['DB_PASSWORD'],
    $_ENV['DB_NAME']
));
echo $controller->{$parameters["_action"]}($request);


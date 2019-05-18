<?php

namespace App\Controllers;
use App\Service\Persistence\RegistryInterface;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class BaseController
{
    public function __construct(RegistryInterface $registry)
    {
    }

    public function render($plantilla,$arguments  = array()){
        $loader = new FilesystemLoader("../views");
        $twig = new Environment($loader);
        return $twig->render($plantilla,$arguments);
    }

}

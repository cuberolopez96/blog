<?php

namespace App\Controllers;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends BaseController
{
    public function index(Request $request){

        return $this->render("index.twig",array());
    }
}

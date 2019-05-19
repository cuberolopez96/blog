<?php


namespace App\Controllers;


use Symfony\Component\HttpFoundation\Request;

class LoginController extends BaseController
{
    public function index(Request $request){
        return $this->render('login/login.twig',array());
    }
}

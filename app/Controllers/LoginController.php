<?php


namespace App\Controllers;


use Symfony\Component\HttpFoundation\Request;

class LoginController extends BaseController
{
    public function index(Request $request){
        return $this->render('login/login.twig',array());
    }
    public function register(Request $request){
        $post = $request->request->all();

        return $this->render('login/register.twig',array());
    }
}

<?php


namespace App\Controllers;


use Symfony\Component\HttpFoundation\Request;

class AdminController extends BaseController
{

    public function index(Request $request){

        return $this->render("admin/admin.twig",array());
    }

}

<?php
namespace Sfm\Application\Controllers;


class HomeController extends Controller
{

    public function index()
    {
        $this->setTitle("Home");
        $this->view("login");
    }


    public function login()
    {
        $this->setTitle("Connexion");
        $this->view("login");
    }
}

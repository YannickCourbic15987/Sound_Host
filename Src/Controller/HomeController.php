<?php

namespace App\Src\Controller;

class HomeController extends Controller
{
    public function index()
    {


        $this->render("Home/home", []);
    }
}

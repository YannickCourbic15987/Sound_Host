<?php

namespace App\Src\Controller;

class AdminController extends Controller
{
    public function index()
    {
        $this->render("Admin/dashboard", []);
    }
}

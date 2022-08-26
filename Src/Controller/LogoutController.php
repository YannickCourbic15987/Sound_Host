<?php

namespace App\Src\Controller;

class LogoutController extends Controller
{
    public function index()
    {
        session_unset();
        session_destroy();
        header('Location:' . HEADER . 'home');
    }
}

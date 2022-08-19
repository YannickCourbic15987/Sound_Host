<?php

namespace App\Src\Controller;

abstract class Controller
{

    public function render(string $path, array $donnees)
    {
        $path = ROOT . "/Views/" . $path . ".php";
        extract($donnees);
        include_once $path;
    }
}

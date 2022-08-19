<?php

namespace App\Src\Controller;

use App\Src\Model\SoundModel;

class AdminIdController extends Controller
{
    public function index()
    {
        $sounds = new SoundModel;



        $sound = $sounds->findById($_POST["id"]);


        $this->render("Admin/displayId", ["sound" => $sound]);
    }
}

<?php

namespace App\Src\Controller;

use App\Src\Model\SoundModel;

class AdminSoundController extends Controller
{

    public function index()
    {

        $sound = new SoundModel;
        $sounds = $sound->findAll();


        $this->render('Admin/sound', ['sounds' => $sounds]);
    }
}

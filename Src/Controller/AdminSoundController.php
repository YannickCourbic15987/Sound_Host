<?php

namespace App\Src\Controller;

use App\Src\Model\SoundModel;

class AdminSoundController extends Controller
{

    public function index()
    {

        $sound = new SoundModel;
        $sounds = $sound->findAll();

        if (isset($_POST['delete']) && !empty($_POST['delete'])) {
            $sound->setId($_POST['delete']);
            $sound->delete();
        }
        $this->render('Admin/sound', ['sounds' => $sounds]);
    }

    public function display($id)
    {
        $sounds = new SoundModel();
        $sounds->setId($id);
        $sound = $sounds->findById();
        $this->render('Admin/displayId', ['sound' => $sound]);
    }
}

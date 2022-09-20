<?php

namespace App\Src\Controller;

use App\Src\Model\EditionModel;

class adminEditeurController extends Controller
{
    public function index()
    {

        $editeur = new EditionModel();
        $editeurs = $editeur->findAll();


        $this->render('Admin/editeur', [
            'editeurs' => $editeurs
        ]);
    }

    public function display($id)
    {
        $editeurs = new EditionModel();
        $editeurs->setId($id);
        $editeur = $editeurs->findById();

        if (isset($_POST["updateTitle"]) && !empty($_POST['updateTitle'])) {
            $_SESSION["updateTitle"] = 1;
        }
        if (isset($_POST["updateLogo"]) && !empty($_POST['updateLogo'])) {
            $_SESSION["updateLogo"] = 1;
        }

        if (isset($_POST['title']) && !empty($_POST['title'])) {
            $title = trim(htmlspecialchars($_POST['title']));

            $updateEditeur = new EditionModel();
            $updateEditeur->setId($id)
                ->setTitle($title);
            $updateEditeur->update();

            unset($_SESSION['updateTitle']);
            header('Location:' .  HEADER . "adminEditeur/$id");
        }

        if (
            isset($_FILES['logo'])
            && !empty($_FILES['logo']['name'])
            && $_FILES['logo']['error'] === 0
        ) {
            $logo = $_FILES['logo'];
            if ($logo['size'] < 3000000) {
                $infoImage = pathinfo($logo['name']);
                $extension = ['jpg', 'jpeg', 'gif', 'png', 'svg'];
                $verifExtend = in_array($infoImage['extension'], $extension);

                if ($verifExtend) {
                    $srcImg = ROOT . '/Editeur/' . time() . time() . rand() . '.' . $infoImage['extension'];
                    unlink(ROOT . '/Editeur/' . $editeur->logo);
                    move_uploaded_file($logo['tmp_name'], $srcImg);
                    $sourceImg = substr(strrchr($srcImg, '/'), 1);
                }
            }

            $updateLogo = new EditionModel();
            $updateLogo->setLogo($sourceImg)
                ->setId($id);
            $updateLogo->update();


            unset($_SESSION['updateLogo']);
            header('Location:' . HEADER . "adminEditeur/$id");
        }

        $this->render('Admin/updateEditeur', [
            'editeur' => $editeur
        ]);
    }
}

<?php

namespace App\Src\Controller;

use App\Src\Model\ProfilModel;
use App\Src\Model\UsersModel;

class ProfilController extends Controller
{
    public function index()
    {


        $user = new UsersModel;
        $user->setEmail($_SESSION['email']);
        $users = $user->findByEmail();
        $_SESSION['id'] = $users->id;
        $profils = new ProfilModel();
        if (
            isset($_POST['pseudo'])
            && !empty($_POST['pseudo'])
        ) {
            $profils->setPseudo(trim(htmlspecialchars($_POST['pseudo'])));


            $image = $_FILES['illustration'];
            if ($image['error'] === 0) {
                $infoImage = pathinfo($image['name']);

                $extensionImage = ['jpg', 'jpeg', 'gif', 'png'];
                $verifExtend = in_array($infoImage['extension'], $extensionImage);
                if ($verifExtend) {
                    $srcImage = ROOT . '/Profils/' . time() . rand() . rand() . '.' . $infoImage['extension'];
                    move_uploaded_file($image['tmp_name'], $srcImage);
                    $sourceImg = substr(strrchr($srcImage, '/'), 1);
                    $profils->setIllustration($sourceImg);
                }
            }
            $profils->setIdUser($users->id);
            $profils->create();
            $_SESSION['profil'] = 1;

            header("Location:" . HEADER . "profil");
        }
        $profils->setIdUser($users->id);
        $profil = $profils->findByUsername();

        if ($profil) {

            $_SESSION['id_profil'] = $profil->id;
        } else {
            $_SESSION['pseudo_tmp'] = time() . rand() . rand();
        }







        $this->render('Profil/profil', [
            'profil' => $profil,
            'users' => $users
        ]);
    }
}

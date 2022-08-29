<?php

namespace App\Src\Controller;

use App\Src\Model\CategoryModel;
use App\Src\Model\MessageDetailsModel;
use App\Src\Model\MessageModel;
use App\Src\Model\ProfilModel;
use App\Src\Model\SubjectDetailsModel;
use App\Src\Model\SubjectModel;

class ForumController extends Controller
{
    public function index()
    {


        $profils = new ProfilModel();
        if (isset($_SESSION['id'])) {
            $profils->setIdUser($_SESSION['id']);
        }
        $profil = (isset($_SESSION['id'])) ?  $profil = $profils->findByUsername() : '';

        $detail = new SubjectDetailsModel();
        $details = $detail->findAll();






        $this->render("Forum/addSubject", [

            'profil' => $profil,
            'details' => $details

        ]);
    }

    public function display($id)
    {

        $messageDetails = new MessageDetailsModel();
        $messageDetails->setIdSubjectDetails($id);
        $message = $messageDetails->findByIdSubjectDetails();
        $subject = new SubjectDetailsModel;
        $subject->setId($id);
        $detail = $subject->findById();
        $categorys = new CategoryModel();
        $categorys->setTitle($detail->category);
        $category = $categorys->findByCategory();
        $idCategory = $category->id;
        $profils = new ProfilModel();
        if (isset($_SESSION['id_profil'])) {

            $profils->setId($_SESSION['id_profil']);
            $profil = $profils->findById();
            $idProfil = $profil->id;
            $pseudo = $profil->pseudo;
        } else {
            $idProfil = null;
            $pseudo = null;
        }
        $Subjects = new SubjectModel();
        $Subjects->setTitle($detail->title);
        $Subject = $Subjects->findBySubject();
        $idSubject = $Subject->id;


        if (isset($_POST['message']) && !empty($_POST['message'])) {
            $text = trim(htmlspecialchars($_POST['message']));

            $message = new MessageModel();
            $message->setText($text)
                ->setIdCategory($idCategory)
                ->setIdProfil($idProfil)
                ->setIdSubject($idSubject);
            $message->create();


            if (isset($_SESSION['id_profil'])) {

                $messageDetails->setPseudo($profil->pseudo)
                    ->setIllustration($profil->illustration)
                    ->setSubject($detail->title)
                    ->setText($text)
                    ->setIdSubjectDetails($id);
                $messageDetails->create();
                $_SESSION['display_img'] = 1;
            } else {
                $messageDetails->setPseudo($_SESSION['pseudo_tmp'])
                    ->setIllustration('profil_img.png')
                    ->setSubject($detail->title)
                    ->setText($text)
                    ->setIdSubjectDetails($id);
                $messageDetails->create();
                $_SESSION['hidden_img'] = 1;
            }
            header('Location:' . HEADER . "forum/$id");
        }
        if (isset($_POST['update']) && !empty($_POST['update'])) {
            $_SESSION['update'] = 1;
        }
        // var_dump($_SESSION);
        if (
            isset($_POST['message_update'])
            && !empty($_POST['message_update'])
            && isset($_POST['publication'])
            && !empty($_POST['publication'])
        ) {
            $message_update = trim(htmlspecialchars($_POST['message_update']));
            $publication = $_POST['publication'];
            var_dump($message_update);
            // var_dump($_POST['publication']);
            $messageUpdate = new MessageModel();
            $messageUpdate->setPublication($publication);
            $messageUpdate->setText($message_update);
            $messageUpdate->updateMessage();
            // unset($_SESSION['update']);
            // header('Location:' . HEADER . "forum/$id");
        }




        $this->render("Forum/message", [
            'detail' => $detail,
            'message' => $message,
            'pseudo' => $pseudo

        ]);
    }
}

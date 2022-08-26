<?php

namespace App\Src\Controller;

use App\Src\Model\CategoryModel;
use App\Src\Model\ProfilModel;
use App\Src\Model\SubjectDetailsModel;
use App\Src\Model\SubjectModel;

class ForumAddController extends Controller
{
    public function index()
    {

        if (
            isset($_POST['title'])
            && !empty($_POST['title'])
            && isset($_POST['category'])
            && !empty($_POST['category'])
        ) {
            $title = trim(htmlspecialchars($_POST['title']));
            $category = trim(htmlspecialchars($_POST['category']));
            $profils = new ProfilModel();
            $profils->setIdUser($_SESSION['id']);
            $profil = $profils->findByUsername();

            $subject = new SubjectModel();
            $subject->setTitle($title)
                ->setProfilId($_SESSION['id_profil'])
                ->setCategoryId($category);
            $subject->create();
            $categorys = new CategoryModel();
            $categorys->setId($category);
            $categories = $categorys->findById();
            $subjectDetails = new SubjectDetailsModel();
            $subjectDetails->setPseudo($profil->pseudo)
                ->setIllustration($profil->illustration)
                ->setTitle($title)
                ->setCategory($categories->title);
            $subjectDetails->create();




            header('Location:' . HEADER . 'forum');
        }

        $this->render('Forum/formSubject', []);
    }
}

<?php

namespace App\Src\Controller;

use App\Src\Model\LibraryModel;

class AdminLibraryController extends Controller
{
    public function index()
    {
        if (isset($_POST['ajouter']) && !empty($_POST['ajouter'])) {
            $_SESSION['ajouter'] = 1;
        }

        if (
            !empty($_FILES['picture']['name'])
            && isset($_FILES['picture']['name'])
        ) {
            $picture = $_FILES['picture'];
            if ($picture['error'] === 0) {
                $infoImage = pathinfo($picture['name']);
                $extension  = ['jpg', 'jpeg', 'gif', 'png', 'svg'];
                $size = $picture['size'];
                if ($size < 3000000) {
                    $verifExtend = in_array($infoImage['extension'], $extension);
                    if ($verifExtend) {
                        $srcImg = ROOT . '/Library/' . time() . rand() . rand() . '.' . $infoImage['extension'];
                        move_uploaded_file($picture['tmp_name'], $srcImg);
                        $sourceImg = substr(strrchr($srcImg, '/'), 1);
                    }
                }
            }

            if (
                !empty($_POST['title'])
                && isset($_POST['title'])
                && !empty($_POST['description'])
                && isset($_POST['description'])
                && !empty($_POST['publication'])
                && isset($_POST['publication'])
                && !empty($_POST['editeur'])
                && isset($_POST['editeur'])
                && !empty($_POST['category'])
                && isset($_POST['category'])
                && !empty($_POST['price'])
                && isset($_POST['price'])
            ) {

                $title = trim(htmlspecialchars($_POST['title']));
                $description = trim(htmlspecialchars($_POST['description']));
                $publication = trim(htmlspecialchars($_POST['publication']));
                $editeur = trim(htmlspecialchars($_POST['editeur']));
                $category = trim(htmlspecialchars($_POST['category']));
                $price = trim(htmlspecialchars($_POST['price']));

                $library = new LibraryModel();
                $library->setTitle($title)
                    ->setDescription($description)
                    ->setPicture($sourceImg)
                    ->setPublication($publication)
                    ->setIdCategory($category)
                    ->setIdEdition($editeur)
                    ->setPrice($price);
                $library->create();
                unset($_SESSION['ajouter']);
                header('Location:' . HEADER . 'adminLibrary');
            }
        }
        $library = new LibraryModel();
        $libraries = $library->findAll();






        $this->render("Admin/library", ['libraries' => $libraries]);
    }
}

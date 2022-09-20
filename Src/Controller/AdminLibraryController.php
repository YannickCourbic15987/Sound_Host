<?php

namespace App\Src\Controller;

use App\Src\Model\CategoryModel;
use App\Src\Model\EditionModel;
use App\Src\Model\LibraryModel;

class AdminLibraryController extends Controller
{
    public function index()
    {
        if (isset($_POST['retour']) && !empty($_POST['retour'])) {
            unset($_SESSION['ajouter']);
            header('Location:' . HEADER . 'adminLibrary');
        }

        if (isset($_POST['ajouter']) && !empty($_POST['ajouter'])) {
            $_SESSION['ajouter'] = 1;
        }

        $categorie = new CategoryModel();
        $categories = $categorie->findAll();
        $editeur = new EditionModel();
        $editeurs = $editeur->findAll();

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
        } else {
            $sourceImg = "book.png";
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
            $library = new LibraryModel();
            $libraries = $library->findAll();


            $this->render("Admin/library", [
                'libraries' => $libraries,
                'categories' => $categories,
                'editeurs' => $editeurs
            ]);
        }
    }

    public function display($id)
    {
        $library = new LibraryModel();
        $library->setId($id);
        $librairie = $library->findById();
        $category = new CategoryModel();
        $category->setId($librairie->id_category);
        $categorie = $category->findByCategory2();
        $categories = $category->findAll();
        $editeur = new EditionModel();
        $editeur->setId($librairie->id_edition);
        $edit = $editeur->findById();
        $editeurs = $editeur->findAll();




        if (isset($_POST['update']) && !empty($_POST['update'])) {
            $_SESSION['update'] = 1;
        }
        if (isset($_POST['retour']) && !empty($_POST['retour'])) {
            unset($_SESSION['update']);
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
            && $_SESSION['update']
        ) {


            $title = trim(htmlspecialchars($_POST['title']));
            $description = trim(htmlspecialchars($_POST['description']));
            $publication = trim(htmlspecialchars($_POST['publication']));
            $editeur = trim(htmlspecialchars($_POST['editeur']));
            $category = trim(htmlspecialchars($_POST['category']));
            $price = trim(htmlspecialchars($_POST['price']));

            $library = new LibraryModel();
            $library->setTitle($title)
                ->setId($id)
                ->setDescription($description)
                ->setPublication($publication)
                ->setIdCategory($category)
                ->setIdEdition($editeur)
                ->setPrice($price);
            $library->update();
            unset($_SESSION['update']);
            header('Location:' . HEADER . "adminLibrary");
        }


        if (isset($_POST['delete']) && !empty($_POST['delete'])) {
            $library = new LibraryModel();
            $library->setId($id);
            $library->delete();
            header('Location:' . HEADER . "adminLibrary");
        }



        $this->render("Admin/viewlibrary", [
            "librairie" => $librairie,
            "categorie" => $categorie,
            "categories" => $categories,
            "edit" => $edit,
            "editeurs" => $editeurs
        ]);
    }
}

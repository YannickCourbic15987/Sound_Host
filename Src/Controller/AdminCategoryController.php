<?php

namespace App\Src\Controller;

use App\Src\Model\CategoryModel;

class AdminCategoryController extends Controller
{
    public function index()
    {

        $category = new CategoryModel();
        $categorys = $category->findAll();

        if (
            isset($_POST['delete'])
            && !empty($_POST['delete'])
            && isset($_POST['id'])
            && !empty($_POST['id'])

        ) {
            $deleteCategory = new CategoryModel();
            $deleteCategory->setId($_POST['id']);
            $deleteCategory->delete();
            header('Location:' . HEADER . "adminCategory");
        }

        $this->render("Admin/category", ["categorys" => $categorys]);
    }


    public function display($id)
    {

        $category = new CategoryModel;
        $category->setId($id);
        $categorys = $category->findById();

        if (isset($_POST["updateTitle"]) && !empty($_POST['updateTitle'])) {
            $_SESSION["updateTitle"] = 1;
        }
        if (isset($_POST["updateLogo"]) && !empty($_POST['updateLogo'])) {
            $_SESSION["updateLogo"] = 1;
        }

        if (isset($_POST['title']) && !empty($_POST['title'])) {
            $title = trim(htmlspecialchars($_POST['title']));

            $updateCategory = new CategoryModel();
            $updateCategory->setId($id)
                ->setTitle($title);
            $updateCategory->update();

            unset($_SESSION['updateTitle']);
            header('Location:' . HEADER . "adminCategory/$id");
        }
        // var_dump($_FILES['logo']);


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
                    $srcImg = ROOT . '/Logo/' . time() . time() . rand() . '.' . $infoImage['extension'];
                    unlink(ROOT . '/Logo/' . $categorys->logo);
                    move_uploaded_file($logo['tmp_name'], $srcImg);
                    $sourceImg = substr(strrchr($srcImg, '/'), 1);
                }
            }

            $updateLogo = new CategoryModel();
            $updateLogo->setLogo($sourceImg)
                ->setId($id);
            $updateLogo->update();


            unset($_SESSION['updateLogo']);
            header('Location:' . HEADER . "adminCategory/$id");
        }





        $this->render("Admin/updatecategory", [
            "categorys" => $categorys
        ]);
    }
}

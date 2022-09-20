<?php

namespace App\Src\Controller;

use App\Src\Model\CategoryModel;

class AdminAddController extends Controller
{
    public function index()
    {


        if (isset($_POST['title']) && !empty($_POST['title'])) {


            $category = new CategoryModel();
            $title = trim(htmlspecialchars($_POST['title']));
            $category->setTitle($title);

            if (isset($_FILES['logo']['name']) && !empty($_FILES['logo']['name'])) {
                $logo = $_FILES['logo'];
                if ($logo['size'] < 300000) {
                    $logoInfo = pathinfo($logo['name'], PATHINFO_ALL);

                    $extension = ['jpg', 'jpeg', 'png', 'gif', 'svg'];
                    if (in_array($logoInfo['extension'], $extension)) {

                        $srcImg = ROOT . '/Logo/' . time() . rand() . rand() . '.' . $logoInfo['extension'];
                        move_uploaded_file($logo['tmp_name'], $srcImg);
                        $sourceImg = substr(strrchr($srcImg, '/'), 1);
                        $category->setLogo($sourceImg);
                    }
                }
            } else {
                $category->setLogo("category_logo.png");
            }
            $category->create();

            header('Location:' . HEADER . 'adminCategory');
        }


        $this->render("Admin/addcategory", []);
    }
}

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
            $category->create();
            header('Location:' . HEADER . 'adminCategory');
        }
        $this->render("Admin/addcategory", []);
    }
}

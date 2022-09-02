<?php

namespace App\Src\Controller;

use App\Src\Model\CategoryModel;

class AdminCategoryController extends Controller
{
    public function index()
    {

        $category = new CategoryModel();
        $categorys = $category->findAll();

        $this->render("Admin/category", ["categorys" => $categorys]);
    }


    public function display($id)
    {
        $this->render("Admin/updatecategory", []);
    }
}

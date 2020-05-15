<?php
/**
 * Created by PhpStorm.
 * User: tu901
 * Date: 2/29/2020
 * Time: 3:25 PM
 */
require_once 'controllers/Controller.php';
require_once 'models/Category.php';
class CategoryController  extends Controller
{
    public function index() {
        $category_model = new Category();
        $categories = $category_model->getAll();
        $this->content = $this->render("views/categories/index.php",[
            'categories' => $categories
        ]);
        require_once "views/layouts/main.php";
    }
    public function create() {

        $this->content = $this->render("views/categories/created.php");
        require_once "views/layouts/main.php";
    }

}
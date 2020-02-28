<?php
/**
 * Created by PhpStorm.
 * User: Hoc vien
 * Date: 2/28/2020
 * Time: 8:13 PM
 */
require_once "model/Book.php";
class BookController {
    public function create() {
        if (isset($_GET['Submit'])){
            print_r($_GET);
            $name = $_GET['name'];
            $amount = $_GET['amount'];
            $book_model = New Book();
            $book_model ->name;
            $book_model ->amount;
            $is_insert = $book_model->insert();
            var_dump($is_insert);
        }
        echo 'dang o trong phuong thuc create trong BookController';
//        goi view de hien thi form
        require_once "view/books/create.php";
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: Hoc vien
 * Date: 2/28/2020
 * Time: 8:13 PM
 */
require_once "model/Book.php";
class BookController {
    public $error;
    public function create(){
        echo "dang o trong phuong thuc create";
        if (isset($_POST['submit'])){
            echo "<pre>";
            print_r($_POST);
            echo "</pre>";
            $name= $_POST['name'];
            $amount = $_POST['amount'];
            $avatar_arr = $_FILES['avatar'];
            $exetention_arr = ['png','jpg','gif','jpeg'];
            $exetention = pathinfo($avatar_arr['name'],PATHINFO_EXTENSION);
           var_dump( $exetention);

            if (empty($name)){
                $this->error= "Khong duoc de trong name";

            }
            elseif (!in_array($exetention,$exetention_arr)){
                $this->error ="phai dung dinh dang anh";
            }
            else {
                if (!empty($this->error)){
                    $dir_upload = __DIR__."../assets/uploads";
                    mkdir($dir_upload);
                    $filename = time(). "-".$avatar_arr['name'];
                    move_uploaded_file($avatar_arr['tmp_name'],$dir_upload. '/' . $filename);
                    $book_model = New Book();
                    $book_model ->name = $name;
                    $book_model->amount =$amount;
                    $book_model ->avatar = $filename;
                    $is_insert = $book_model->insert();
                    if ($is_insert){
                        $_SESSION['success'] = "Insert Thanh cong";
                    }
                    else {
                        $_SESSION['error'] = "Insert That bai";
                        header("Location: index.php?controller=book&action=create");
                    }

                }
            }
        }
        require_once "view/books/create.php";
    }
}
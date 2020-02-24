<?php
/**
 * Created by PhpStorm.
 * User: Hoc vien
 * Date: 2/24/2020
 * Time: 8:46 PM
 */
class Book {
    const DB_HOST = 'localhost';
    const DB_USERNAME = 'root';
    const DB_PASSWORD = '';
    const DB_NAME = 'book_oop';
    const DB_PORT = 3306;
    public $id;
    public $name;
    public $amount;
    public $created_at;
    public function connectDB(){
        $connection = mysqli_connect(self::DB_HOST,self::DB_USERNAME,self::DB_PASSWORD,self::DB_NAME,self::DB_PORT);
        if(!$connection){
            die("Connect Fail".mysqli_connect_error());
        }
        return $connection;
    }
    public function disconnectDB($connection){
        mysqli_close($connection);
    }

    /**
     * Liet ke danh sach book dang co trong db
     */
    public function listBook(){
        echo 'phuong thuc listBook';
    }
    public function insertBook(){
        $connection = $this->connectDB();
        $query_insert= "INSERT INTO book (`name`,`amount`) VALUES ('{$this->name}',{$this->amount} )";
        $is_insert = mysqli_query($connection,$query_insert);
        $this->disconnectDB($connection);
        return $is_insert;
    }
    public function editBook($id){
        echo 'phuong thuc editBook';
    }
    public function deleteBook($id){
        echo 'phuong thuc deleteBook';
    }
}
$book = New Book;
$book->name = 'sach van hoc';
$book->amount = 123;
$is_insert = $book ->insertBook();
$book->insertBook();
if ($is_insert){
    echo 'them sach thanh cong';
}
else {
    echo 'ket noi khong thanh cong';
}
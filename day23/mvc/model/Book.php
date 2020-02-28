<?php
/**
 * Created by PhpStorm.
 * User: Hoc vien
 * Date: 2/28/2020
 * Time: 8:12 PM
 */
class Book {
    const DB_DSN = 'mysql:host=localhost;dbname=book_mvc;charset=utf8';
    const DB_USERNAME = 'root';
    const DP_PASSWORD = '';
    public $name;
    public $amount;
public function connectDB(){
    try {
        $connection = New PDO(self::DB_DSN,self::DB_USERNAME,self::DP_PASSWORD);
    }
    catch (PDOException $e) {
        die('Co loi: '.$e->getMessage());
    }
    return $connection;
}
public function insert(){
    $connection= $this ->connectDB();
    $obj_insert =$connection->prepare("INSERT INTO book(`name`,`amount`) VALUE (:name, :amount)");
    $arr_select = [
        ':name' =>$this ->name,
        ':amount' => $this ->amount,
    ];
    return $obj_insert->execute($arr_select);


}
}
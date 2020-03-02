<?php
/**
 * Created by PhpStorm.
 * User: tu901
 * Date: 2/29/2020
 * Time: 3:26 PM
 */

class employee{
const DB_DSN = 'mysql:host=localhost;dbname=employees_mvc;charset=utf8';
const DB_USERNAME = 'root';
const DB_PASSWORD = '';
public $name;
public $description;
public $gender;
public $salary;
public $birthday;
public $error;
public function connectDB(){
    try {
        $connection =New PDO (self::DB_DSN,self:: DB_USERNAME,self::DB_PASSWORD);
    }
    catch (PDOException $e){
        die('Co loi: '. $e->getMessage());
    }
    return $connection;
}
public function insert() {
    $connection = $this->connectDB();
    $obj_insert = $connection->prepare("INSERT INTO employees(`name`,`description`,`gender`,`salary`,`birthday`) VALUE (:name, :description, :gender, :salary, :birthday)");
    $arr_insert = [
      ':name' => $this->name,
      ':description' => $this->description,
      ':gender' =>$this->gender,
      ':salary' =>$this->salary,
      ':birthday' => $this->birthday
    ];
    return $obj_insert->execute($arr_insert);
}
public function select() {
    $connection = $this ->connectDB();
    $obj_select = $connection->prepare("SELECT * FROM employees");
    return $obj_select;
}
}
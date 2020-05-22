<?php
/**
 * Created by PhpStorm.
 * User: tu901
 * Date: 5/18/2020
 * Time: 3:21 PM
 */
require_once 'models/Model.php';

class User extends Model{
    public $first_name;
    public $last_name;
    public $email;
    public $password;
    public $username;
    public $id_user;
    public function getUsers() {
        $connection = $this->connectDB();;
        $obj_select = $connection->prepare("SELECT * FROM users");
        $obj_select ->execute();
        $users = $obj_select->fetchAll(PDO::FETCH_ASSOC);
        return $users;
    }
    public function insert()
    {
        $connection = $this ->connectDB();
        $obj_insert = $connection->prepare("INSERT INTO
        users (`id_user`,`first_name`,`last_name`,`email`,`password`,`username`) VALUES (:id_user,:first_name, :last_name, :email, :password,:username)");
        $arr_insert = [
            ':first_name' => $this ->first_name,
            ':last_name' => $this ->last_name,
            ':email' => $this ->email,
            ':password' => $this->password,
            ':username' =>$this->username,
            ':id_user' =>$this->id_user
        ];
        $is_insert = $obj_insert->execute($arr_insert);
        return $is_insert;
    }
}
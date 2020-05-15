<?php
/**
 * Created by PhpStorm.
 * User: tu901
 * Date: 5/9/2020
 * Time: 8:04 PM
 */
require_once 'configs/database.php';
class Model {
    public $connection;

    public function __construct()
    {
        $this->connection =$this->connectDB();

    }

    function connectDB() {
        try {
            $connection = New PDO ( DB_DSN, DB_USERNAME,DB_PASSWORD);
        }
        catch (PDOException $e) {
            die('Co loi: '. $e ->getMessage());
        }
        return$connection;
    }
    public function closeConnection() {
        $this->connection = null;
    }
}
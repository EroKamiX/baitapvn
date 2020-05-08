<?php
/**
 * Created by PhpStorm.
 * User: Hoc vien
 * Date: 5/8/2020
 * Time: 6:50 PM
 */
?>
<!--và tạo 1 biến kết nối theo cơ ché pdo-->
<?php
const DB_DSN = 'mysql:host=localhost;dbname=php_demo;charset=utf8';
const DB_USERNAME = 'root';
const DB_PASSWORD =  '';
try {
    $connection = new PDO(DB_DSN,DB_USERNAME,DB_PASSWORD);
}
catch (PDOException $e) {
    die( "Ket Noi that bai".$e->getMessage());
}
?>
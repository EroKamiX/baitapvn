<?php
/**
 * Created by PhpStorm.
 * User: Hoc vien
 * Date: 5/8/2020
 * Time: 8:05 PM
 */
session_start();
require_once "database.php";
if (isset($_SESSION['success'])){
    echo $_SESSION['success'];
    unset($_SESSION['success']);
}
if (isset($_SESSION['error'])){
    echo $_SESSION['error'];
    unset($_SESSION['error']);
}
$obj_select = $connection ->prepare("SELECT * FROM book ");
$obj_select ->execute();
$book = $obj_select ->fetchAll(PDO::FETCH_ASSOC);
echo "<pre>";
print_r($book);
echo "</pre>";
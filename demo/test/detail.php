<?php
/**
 * Created by PhpStorm.
 * User: Hoc vien
 * Date: 5/8/2020
 * Time: 8:47 PM
 */
require_once "database.php";
$id = 2;
$obj_select = $connection->prepare("SELECT * FROM book WHERE id=$id");
$book = $obj_select->execute();
$book = $obj_select->fetch(PDO::FETCH_ASSOC);
echo "<pre>";
print_r($book);
echo "</pre>";
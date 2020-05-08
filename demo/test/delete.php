<?php
/**
 * Created by PhpStorm.
 * User: Hoc vien
 * Date: 5/8/2020
 * Time: 8:33 PM
 */
require_once "database.php";
$title_new = "hahahaha";
$id = 1;
$obj_delete =$connection->prepare("DELETE FROM book WHERE id = $id");

$is_delete = $obj_delete->execute();
var_dump($is_delete);
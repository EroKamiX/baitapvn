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
$obj_update =$connection->prepare("UPDATE book SET title= :title WHERE id = $id");
$arr_update = [
  ":title" => $title_new,
];
$is_update = $obj_update->execute($arr_update);
if (!$is_update) {
    $_SESSION['error'] = "update khong thanh cong";
} else {
    $_SESSION['success'] = "update thanh cong";
}
?>


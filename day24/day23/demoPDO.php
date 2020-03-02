<?php
/**
 * Created by PhpStorm.
 * User: Hoc vien
 * Date: 2/28/2020
 * Time: 6:43 PM
 */
//kết nối CSDL sử dụng cơ chế PDO
const DB_DSN = 'mysql:host=localhost;dbname=book_oop;charset=utf8';
const DB_USERNAME = 'root';
const DP_PASSWORD = '';

try {
    $connection = New PDO(DB_DSN,DB_USERNAME,DP_PASSWORD);
} catch (PDOException $e){
    echo "ket noi that bai";
    die;
}
echo "ket noi thanh cong";

$obj_insert = $connection->prepare('INSERT INTO book (`name`,`amount`) VALUE (:name , :amount)');
//truyen su lieu that cho cac param vua gan
$arr_book = [
    'name' => 'Shuten',
    ':amount' => 1
];
//thuc thi truy van
$is_insert = $obj_insert->execute($arr_book);
if ($is_insert){
    echo "insert success";
}
else {
    echo 'insert fail';
}
$obj_update = $connection->prepare('UPDATE book SET `name` = :name WHERE id = :id');
$arr_update = [
    ':name' => 'ibaraki',
    ':id' => 1
];
$is_update = $obj_update->execute($arr_update);
if ($is_update){
    echo "<br>"."update success";
}
else {
    echo "update fail";
}
$obj_delete = $connection->prepare("DELETE FROM book WHERE id= :id");
$arr_delele = [
    ':id' => 2
];
$is_delete = $obj_delete->execute($arr_delele);
if ($is_delete){
    echo "<br>"."delete success";
}
else {
    echo "delete fail";
}
$obj_select = $connection->prepare("SELECT * FROM book WHERE id> :id");
$arr_select = [
  ':id' => 2
];
$obj_select ->execute($arr_select);
$book = $obj_select->fetchAll(PDO::FETCH_ASSOC);
echo '<pre>';
print_r($book);
echo '</pre>';

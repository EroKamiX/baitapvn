<?php
/**
 * Created by PhpStorm.
 * User: Hoc vien
 * Date: 2/28/2020
 * Time: 8:12 PM
 */
//echo '<br>'.'View create cua BookController';
require_once "view/layouts/header.php";
?>

<form action="" method="get">
    Ten Sach:
    <input type="text" name="name">
    <br>
    So luong:
    <input type="number" name="amount">
    <br>
    <input type="submit" value="Submit" name="Submit">
</form>
<?php require_once "view/layouts/footer.php"?>
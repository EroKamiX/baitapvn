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

<form action="" method="POST" enctype="multipart/form-data">
    Ten Sach:
    <input type="text" name="name">
    <br>
    So luong:
    <input type="text" name="amount" value="">

    <br>
    Avatar:
    <input type="file" name="avatar">
    <br>
    <input type="submit" value="Submit" name="submit">
</form>
<?php require_once "view/layouts/footer.php"?>
<?php
session_start();
if (!isset($_GET['id'])){
    $_SESSION['error'] = 'Id Khong ton tai';
    header('Location:index.php');
    exit();
}
elseif (!is_numeric($_GET['id'])) {
    $_SESSION['error'] = 'ID phai la so';
}
$id = $_GET['id'];
if (isset($_POST['submit'])) {
    require_once 'crud.php';
    $name = $_POST['name'];
    $age = $_POST['age'];
    $sql_update = "UPDATE students SET `name` = '$name',`age` = $age WHERE id = $id";
    $is_update = mysqli_query($connection, $sql_update);
    mysqli_close($connection);
    if ($is_update) {
        $_SESSION['success'] = 'Update thành công';


    } else {
        $_SESSION['error'] = "Update thất bại";
    }
    header("Location: index.php");
    exit();
}
?>


<form method="post" action="">
    Name:
    <input type="text" name="name" value="">
    Age:
    <input type="number" name="age" value="" >
    <br>
    <button type="submit" name="submit">Update</button>
</form>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<?php
session_start();
if (!isset($_GET['id'])){
    $_SESSION['error'] = "tham số id không hợp lệ";
    header("Location: index.php");
    exit();
}
$id = $_GET['id'];
require_once 'crud.php';
$sql_delete = "DELETE FROM students WHERE id = $id";
$is_delete = mysqli_query($connection,$sql_delete);
if ($is_delete){
    $_SESSION['success'] = "Xóa bản gi thành công";
}
else {
    $_SESSION['error'] = "xóa bản ghi khong thành công";

}
header("Location: index.php")
?>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<?php
session_start();
if (!isset($_SESSION['username'])){
    $_SESSION['success'] = "Cần đăng nhập để truy cập trang này";
    header('Location: bai2.php');
    die();

}
?>
<h3><?php if (isset($_SESSION['username'])){
    echo $_SESSION['username'];
    }?></h3>
<h3><?php if (isset($_SESSION['success'])){
    echo $_SESSION['success'];
    unset($_SESSION['success']);
    }?></h3>
<h3><a href="logout.php">Đăng xuất</a></h3>

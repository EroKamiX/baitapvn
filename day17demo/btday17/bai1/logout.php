<?php
session_start();
unset($_SESSION['username']);
$_SESSION['success'] = "Đăng xuất thành công";
header('Location: bai1.php')
?>
<?php
session_start(); // hàm khai báo ở đàu file

$_SESSION['age']= 15;
$_SESSION['name']= 'Tu Anh';
$_SESSION['arr']= [1,2,3,4,5,6];
$name = $_SESSION['name'];
$age = $_SESSION['age'];
// xóa dữ liệu session
unset($_SESSION['name']);
//xóa hết toàn bộ session
//session_destroy();
echo "<pre>";
echo print_r($_SESSION);
echo "</pre>";
?>
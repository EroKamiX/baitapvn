<?php
session_start();
if (isset($_SESSION['save'])) {
    $_SESSION['save-username'] = $_SESSION['username'];
    $_SESSION['save-password'] = $_SESSION['password'];
}
else {
    unset($_SESSION['save-username']);
    unset($_SESSION['save-password']);


}
unset($_SESSION['save']);
unset($_SESSION['username']);
unset($_SESSION['password']);
$_SESSION['success'] = "Đăng xuất thành công";
header('Location: bai2.php')
?>
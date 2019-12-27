<?php
session_start();
echo "<pre>";
print_r($_SESSION);
echo "</pre>";
unset($_SESSION['username']);
$_SESSION['success'] = "đăng xuất thành công";
header("Location: form_login.php ");
exit();
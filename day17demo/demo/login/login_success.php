<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<?php
session_start();
if (!isset($_SESSION['username'])){
    header("Location: form_login.php");
}
?>
<h1><?php echo isset($_SESSION['success']) ? $_SESSION['success'] : '' ;
    unset($_SESSION['success']);
    ?></h1>
<h1 style="color: green"> Chào mừng bạn ,<?php echo $_SESSION['username'] ?>
<a href="logout.php">Đăng xuất</a>
</h1>

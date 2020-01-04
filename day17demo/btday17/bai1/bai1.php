<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<?php
session_start();
$error = "";
if (isset($_SESSION['username'])){
    $_SESSION['success'] = "Bạn đã đăng nhập rồi";
    header("Location = Login_success.php");
    die();
}
if (isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    if (empty($username) || empty($password)){
        $error = "Không được để trống Username hoặc Password";
    }
    elseif ($username != "nvmanh" || $password != 123456){
        $error = " Sai Username hoặc Password";
    }
    else {
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "Đăng nhập thành công";
        header("Location: Login_success.php");
        exit();

    }
}
?>
<h3 style="color: green"><?php if (isset($_SESSION['success'])){
        echo $_SESSION['success'];
        unset($_SESSION['success']);
    }?></h3>
<h3 style="color: #fd1300;"><?php echo $error?></h3>
<form action="" method="post">
    Username : <br>
    <input type="text" name="username"> <br>
    Password : <br>
    <input type="password" name="password">
    <br>
    <input type="submit" value="Login" name="submit">
</form>

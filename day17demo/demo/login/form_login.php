<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<?php
$error = '';
$result = '';
session_start();
if (isset($_SESSION['username'])){
    $_SESSION['success'] = "Mày là gì thế . Đăng nhập rồi mà";
    header("Location: login_success.php");
    exit();

}
    if (isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        if (empty($username) || empty($password)){
            $error = 'Không được để trống thông tin';
        }
        elseif ($username !='erokami' || $password !=123456){
            $error = "Sai tài khoản hoặc mặt khẩu";
        }
        else {
            //chuyển hướng người dùng sang trang login_success.php kèm theo thông báo đăng nhập thành công
            $_SESSION['username'] = $username;
            $_SESSION['success'] = "đăng nhập thành công";
//            dùng hàm chuyển hướng header
            header("Location: login_success.php");
            exit();
        }
    }
?>

<h3 style="color: red"><?php echo $error;
if (isset($_SESSION['error'])){
    echo $_SESSION['error'];
    unset($_SESSION['error']);}
    ?></h3>
<h3 style="color: green"><?php if (isset($_SESSION['success'])){
    echo  $_SESSION['success'];
    unset($_SESSION['success']);
    }
    ?></h3>
<form action="" method="post" >
    Username : <br>
    <input type="text" name="username" value=""> <br>
    Password : <br>
    <input type="password" name="password" value=""> <br>
    <br>
    <input type="submit" name="submit" value="Login">
</form>

<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<!--//chỉ khi có submit form-->
<!--// sử dụng hàm inset() để check xem 1 biến đã từng tồn tại-->
<!--//trước đó ha chưa-->
<?php

if (isset($_POST['submit'])){
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
    $username = $_POST['username'];
    $password = $_POST['Password'];
//    xử lý validate
    $error ="";
    $result ="";
if (empty($username)|| empty($password)){
    $error = "Usernam hoặc password chưa nhập";
}
elseif (strlen($password) <3){
    $error ="Password tối thiểu là 3";
}
else {
//    nếu username = admin và password
if ($password =='admin' && $username == 'admin'){
    $result = 'Đăng nhập thành công';
}
else {
    $error = "sai tài khoản mật khẩu";
}}
}
?>
<h3 style="color: red"><?php echo $error?></h3>
<h3 style="color: green;"><?php echo $result?></h3>
<form action="" method="post">
    Username:
    <input type="text" name="username" value="<?php echo isset($_POST['username']) ?
    $_POST['username']: ''?>" />
    <br />
    Password :
    <input type="password" name="Password" />
    <br />
    <input type="submit" value="Login" name="submit" />
</form>
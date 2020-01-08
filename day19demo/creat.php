<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<?php
session_start();
$error = '';

if (isset($_POST)){
    echo '<pre>';
    print_r($_POST);
    echo '</pre>';
    $name = $_POST['name'];
    $age = $_POST['age'];
    if (empty($name) || empty($age)){
        $error = "không được để trống";
    }
    elseif ($age <= 0){
        $error = "Nhập tuổi số dương";
    }
    else {
        require_once "crud.php";
        $sql_insert = "INSERT INTO students (`name`,`age`) VALUE ('EROKAMI',19)";
        $is_insert = mysqli_query($connection,$sql_insert);
        if ($is_insert){
            $_SESSION['success'] = 'Thêm mới thành công';


        }
        else {
            $_SESSION['error'] = "insert thất bại";
        }
        header ("Location: index.php");
        exit();
    }

}
?>
<h3 style="color: red;"><?php echo $error?></h3>
<form action="" method="post">
    Nhập tiên: <br>
    <input type="text" name="name" value=""> <br>
    Nhập tuổi: <br>
    <input type="number" name="age" value=""> <br>
    <button type="submit" name="submit" >Thêm mới</button>
</form>
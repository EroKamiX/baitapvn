<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<?php
session_start();
$error = '';
if (isset($_POST['submit'])) {
    if (empty($_POST['name'])) {
        $error = 'Không được để trống trường name';
    } elseif (empty($_POST['description'])) {
        $error = 'Không được để trống mô tả';
    } elseif (empty($_POST['salary'])) {
        $error = 'Không nhập khoản lương';
    } elseif (!isset($_POST['gender'])) {
        $error = 'Cần khai báo giới tính';
    } elseif (empty($_POST['birthday'])) {
        $error = 'Cần nhập ngày sinh';
    } else {
        require_once 'crud.php';
        $name = $_POST['name'];
        $description = $_POST['description'];
        $salary = $_POST['salary'];
        $birthday = $_POST['birthday'];
        $gender = $_POST['gender'];

        $insert = "INSERT INTO employees (`name`,`description`,`gender`,`salary`,`birthday`) VALUE ('$name','$description',$gender,$salary,$birthday)";
        $is_insert = mysqli_query($connection,$insert);
        if ($is_insert){
            $_SESSION['error'] = "Thêm thanh cong";
        }
        else {
            $_SESSION['error']= "Thêm that bai";
        }
    }
    header("Location: index.php");
}


?>
<link rel="stylesheet" href="css/bootstrap.min.css">
<div class="container">
<h3><?php echo $error?></h3>
<h3>Create Record</h3>
<form method="post" action="">
    <hr>
    Name:
    <br>
    <input type="text" name="name">
    <br>
    Description:
    <br>
    <textarea name="description"></textarea>
    <br>
    Salary:
    <br>
    <input type="number" name="salary">
    <br>
    Gender:
    <br>
    <input type="radio" name="gender" value="1"> Male <input type="radio" name="gender" value="2"> Female
    <br>
    Birthday:
    <br>
    <input type="date" name="birthday" id="">
    <br>
    <button type="submit" name="submit" class="btn-primary" >Save</button>
    <button type="reset" class="btn btn-light">Cancel</button>


</form>
</div>

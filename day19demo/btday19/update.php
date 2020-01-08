<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<?php
session_start();
$error = '';
if (!isset($_GET['id'])){
    $_SESSION['error'] = "ID NOT EXIST";
}
else {
    require_once 'crud.php';
    $id =$_GET['id'];
    $sql_select = "SELECT * FROM employees WHERE id= $id";
    $result = mysqli_query($connection,$sql_select);
    $employee=[];
    if (mysqli_num_rows($result)>0){
        $employees = mysqli_fetch_all($result,MYSQLI_ASSOC);
        $employee = $employees[0];
        echo "<pre>";
        print_r($employee);
        echo "</pre>";
    }

}
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
        //fỏmat
        $birthday = date("Y-m-d H:i:s",strtotime($_POST['birthday']));
        $gender = $_POST['gender'];
        //do e chưa bao lấy biến $bỉthday trong 1 chuỗi nên nó báo lỗi cú pháp, danã đến ko update đc
        $sql_update = "UPDATE employees SET `name` = '$name',`description` = '$description', `salary` = $salary,`birthday` = '$birthday'
        , `gender`= $gender WHERE id = $id" ;
//        print_r($sql_update);die;
        $is_update = mysqli_query($connection,$sql_update);
        if ($is_update) {
            $_SESSION['success'] = "Cập nhật thanh cong";
        }
        else {
            $_SESSION['error']= "Cập nhật that bai";
        }
    }

    header("Location: index.php");
    exit();
}
if (isset($_POST['reset'])) {
    header("Location: index.php");
    exit();
}
?>
<link rel="stylesheet" href="css/bootstrap.min.css">
<?php if (!$_GET['id']) :?>
<?php header('Location: index.php');
exit()?>
<?php else :?>
<div class="container">
    <h3><?php echo $error?></h3>
    <h3>Update Record</h3>
    <form method="post" action="">
        <hr>
        <p>please edit the input value and submit to update the record</p>
        Name:
        <br>
        <input type="text" name="name" value="<?php echo $employee['name'] ?>">
        <br>
        Description:
        <br>
        <textarea name="description"><?php echo $employee['description']?></textarea>
        <br>
        Salary:
        <br>
        <input type="number" name="salary" value="<?php echo $employee['salary']?>">
        <br>
        Gender:
        <br>
        <input type="radio" name="gender" value="1" <?php if ($employee['gender'] == 1){ echo 'checked'; } ?> > Male
        <input type="radio" name="gender" value="2" <?php if ($employee['gender'] == 0){ echo 'checked'; } ?> > Female
        <br>
        Birthday:
        <br>
<!--     format bắt buộc phải là Y-m-d với input type = date nhé, a vừa checfk lạioke   -->
        <input type="date" name="birthday" value="<?php echo date("Y-m-d",strtotime($employee['birthday']))?>">
        <br>
        <button type="submit" name="submit" class="btn-primary" >Save</button>
        <button type="reset" name="reset" class="btn btn-light">Cancel</button>


    </form>
</div>
<?php endif;?>
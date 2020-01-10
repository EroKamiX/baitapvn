<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<?php
session_start();
$error = '';
$result = '';
if (isset($_POST['submit'])) {
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
    $pattern = '/[a-zA-Z]\\s{1,10}/';

    if (empty($_POST['name']) || !isset($_POST['gender']) || !isset($_POST['jobs']) || $_POST['country'] == -1) {
        $error = "Cần nhập dữ liệu";
    }
    elseif (!preg_match($pattern,$_POST['name'])){
        $error ='Các từ trong tên chứa ít nhất 2 kí tự';
    }
    else{
        $_SESSION['name'] = $_POST['name'];
        header("Location: index.php");
        exit();
    }
}
?>

<form action="" method="post">
    Họ tên: <input type="text" name="name" > <br>
    Giới tính <input type="radio" name="gender" value="1"> Male <input type="radio" name="gender" value="0"> Female <br>
    Nghề nghiệp :
    <input type="checkbox" name="jobs[]" value="0"> Deverloper
    <input type="checkbox" name="jobs[]" value="1"> Tester
    <input type="checkbox" name="jobs[]" value="2"> BA - Bussiness Analysis
    <br>
    Quốc gia :
    <select name="country">
        <option value="-1">-- Chọn quốc gia --</option>
        <option value="1">Việt Name</option>
        <option value="2">USA</option>
    </select>
    <br>
    <button type="submit" name="submit">Đăng ký</button>
    <input type="reset" name="reset" value="Reset">
</form>
<h3 style="color: green"><?php echo $result?></h3>
<h3 style="color: red"><?php echo $error?></h3>
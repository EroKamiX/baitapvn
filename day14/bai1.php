<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<?php
$error = "";
$result = "";
if (isset($_POST['submit'])){
    if ($_POST['name'] == ""){
        $error = "Không được để trống name";
    }
    elseif ($_POST['email']== ""){
        $error = "Không được để trống Email";
    }
    elseif (strpos($_POST['email'],'@') <= 1 ||
        strrpos($_POST['email'],'.')-strrpos($_POST['email'],'@') <= 2 ){
        $error = "Nhập đúng kiểu Email";
    }
    elseif ($_POST['day']== ""){
        $error = "Không được để trống ngày";
    }
    elseif ($_POST['detail']== ""){
        $error = "Không được để trống thông tin";
    }
}
?>
<form action="" method="post" >
    <h3>Tutorials Point Absolute classes resgistration</h3>
    <table>
        <tr>
            <td>Name</td>
            <td><input type="text" name="name" value="" id="name"></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type="text" name="email" value="" id="email"></td>
        </tr><tr>
            <td>Specific day</td>
            <td><input type="text" name="day" value="" id="day"></td>
        </tr><tr>
            <td>Class details</td>
            <td><textarea id="class-details" name="detail"></textarea></td>
        </tr><tr>
            <td>Gender</td>
            <td><input type="radio" name="gender" value="" id="Female"> Female
                <input type="radio" name="gender" value="" id="male"> Male
            </td>
        </tr><tr>
            <td><input type="submit" name="submit" value="show info" id="submit"></td>
        </tr>

    </table>
</form>
<h3 style="color: green">
    <?php echo "<pre>";
    print_r($_POST);
    echo "</pre>";
    ?><h3>
<h3 style="color: red"><?php echo $error?><h3>

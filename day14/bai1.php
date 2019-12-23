<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<?php
$error = "";
$result = "";
if (isset($_POST['submit'])){
    if (empty($_POST['name'])== true){
        $error = "Không được để trống name";
    }
    elseif (empty($_POST['email'])== true){
        $error = "Không được để trống Email";
    }
    elseif (!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
        $error = "Nhập đúng kiểu Email";
    }
    elseif ($_POST['day']== ''){
        $error = "Không được để trống ngày";
    }
    elseif ($_POST['detail']== ''){
        $error = "Không được để trống thông tin";
    }
    elseif (!isset($_POST['gender'])){
        $error = "Cần nhập giới tính";
    }
    else {
        $result .="<h3>You given details are as: </h3>";
        $result .= 'Username : '.$_POST['name']."<br>";
        $result .= 'Email : '.$_POST['email']."<br>";
        $result .= 'Specific day : '.$_POST['day']."<br>";
        $result .= 'Class details : '.$_POST['detail']."<br>";
        if ($_POST['gender'] == 1 ){
            $result .= 'Gender : '."Female";
        }
        else {
            $result.= 'Gender : '."Male";
        }

    }


}
?>
<form action="" method="post" >
    <h3>Tutorials Point Absolute classes resgistration</h3>
    <table>
        <tr>
            <td>Name</td>
            <td><input type="text" name="name" value="<?php echo isset($_POST['name'])? $_POST['name'] : '' ?>" id="name"></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type="text" name="email" value="<?php echo isset($_POST['email'])? $_POST['email'] : '' ?>" id="email"></td>
        </tr><tr>
            <td>Specific day</td>
            <td><input type="date" name="day" value="<?php echo isset($_POST['day'])? $_POST['day'] : '' ?>" id="day"></td>
        </tr><tr>
            <td>Class details</td>
            <td><textarea id="class-details" cols="22px" rows="5px" name="detail"><?php echo isset($_POST['detail'])? $_POST['detail'] : '' ?></textarea></td>
        </tr><tr>
            <?php
            $checked_female = "";
            $checked_male = "";
            if (isset($_POST['gender'])){
                $gender = $_POST['gender'];
                switch ($gender){
                    case 1:
                        $checked_female = "checked=true";
                        break;
                    case 2:
                        $checked_male = "checked=true";
                        break;
                }
            }
            ?>
            <td>Gender</td>
            <td><input type="radio" <?php echo $checked_female?> name="gender" value="1" id="Female"> Female
                <input type="radio" <?php echo $checked_male?> name="gender" value="2" id="male"> Male
            </td>
        </tr><tr>
            <td><input type="submit" name="submit" value="Show info" id="submit"></td>
        </tr>

    </table>
</form>
<h3 style="color: green">
    <?php echo "<pre>";
    print_r($result);
    echo "</pre>";
    ?><h3>
<h3 style="color: red"><?php echo $error?><h3>

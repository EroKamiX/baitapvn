<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<?php
$error = '';
$result = '';
if (isset($_GET['submit'])){
    $number = $_GET['number'] ;
    if (empty($number)){
        $error = 'Cần nhập dự liệu';
    }
    elseif (!is_numeric($number)){
        $error = "Cần nhập số";
    }
    else {
        if ($number <=50){
            $result = $number*1000;
        }
        elseif ($number>50 &&$number <100){
            $result = 50*1000;
            $result += ($number - 50)*2000;
        }
        elseif ($number>100 &&$number <200){
            $result = 50*1000;
            $result += 50*2000;
            $result += ($number - 100)*3000;
        }
        elseif ($number >99200){
            $result = 50*1000;
            $result += 50*2000;
            $result += 100*3000;
            $result += ($number - 200)*4000;
        }

    }
}
?>
<h3 style="color: red"><?php echo $error?></h3>
<form action="" method="get">
    Nhập số tiền tiêu thụ <br>
    <input type="text" name="number" >
    <table border="0" >
        <tr>
            <th colspan="2">Bảng giá tiền điện bậc thang</th>
        </tr>
        <tr>
            <td>0-50KW</td>
            <td><b>1000d/KW</b></td>
        </tr>
        <tr>
            <td>trên 50 -100KW</td>
            <td><b>2000d/KW</b>
                <br>
                từ 0 - 50KW giá sẻ là 1000đ/KW
            </td>
        </tr>
        <tr>
            <td>trên 100 -200KW</td>
            <td><b>3000d/KW</b>
                <br>
                từ 0 - 50KW giá sẻ là 1000đ/KW
                <br>
                từ 50 - 100KW giá sẻ là 2000đ/KW
            </td>
        </tr>
        <tr>
            <td>trên 200</td>
            <td><b>4000d/KW</b>
                <br>
                từ 0 - 50KW giá sẻ là 1000đ/KW
                <br>
                từ 50 - 100KW giá sẻ là 2000đ/KW
                <br>
                từ 100 - 200KW giá sẻ là 3000đ/KW
            </td>
        </tr>
    </table>
    <input type="submit" name="submit" value="Tính tiền">
</form>
<h3 style="color: green"><?php echo $result?></h3>
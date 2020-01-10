<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<?php
function isPrime ($number){
    if ($number <2){
        return false;
    }
    $is_Prime = true;
    for ($i=2;$i<=sqrt($number);$i++){
        if ($number % $i == 0){
            $is_Prime = false;
            break;
        }

    }
    return $is_Prime;
}
$error = '';
$result = '';
if (isset($_GET['submit'])){
    $number = $_GET['number'];
    if (empty($number)){
        $error = 'Cần nhập dữ liệu';
    }
    elseif (!is_numeric($number)){
        $error = 'Cần nhập giữ liệu là số';
    }
    else {

        $result = "Các Số nguyên tố nhỏ hơn $number là: ";

        for ($i =0;$i <=$number;$i++){
            if(isPrime($i)){
               $result .= "$i,";
            }
        }
        $result = substr($result,0,-1);
    }
}
?>

<form action="" method="get">
    Nhập số nguyên tố
    <br>
    <input type="number" name="number">
    <br>
    <input type="submit" name="submit" value="submit">
</form>
<h3 style="color: green"><?php echo $result?></h3>
<h3 style="color: red"><?php echo $error?></h3>
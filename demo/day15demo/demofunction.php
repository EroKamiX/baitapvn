<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<?php
$string = "abc def";
echo strtoupper($string);
$string = "hello abc";
echo ucfirst($string);
$string = "my name is ta";
echo ucwords($string);
$string = "    adfkljdjasf     ";
echo trim($string);
//tim kiem  và thay the
$string = "abc df";
echo str_replace("abc","gi cung đc",$string);
$string = "llaa 12314 12321 dádas";
echo preg_replace("/[0-9]/","-",$string);
$string = "hello world";
echo substr($string,0,3);
// hàm thao tác ngày tháng
$datetime = "2019 - 05 - 30 15:00:00";
echo date('d-m-Y H-i-s', strtotime($datetime));
date_default_timezone_set('Asia/Ho_Chi_Minh');
echo date('d-m-Y H-i-s', time());
$price = 125000000;
echo "<br>".number_format($price,0,'.','.');
?>


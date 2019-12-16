<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<?php
function math($a,$b){
    $chuvi = ($a + $b)*2;
    echo "Chu vi hình chữ nhật = $chuvi m";
    echo "<br>";
    $dientich = $a *$b;
    echo "Diện tích hình chữ nhật = $dientich m<sup>2</sup>";
}
$a =10;
$b = 5;
math($a,$b);
?>
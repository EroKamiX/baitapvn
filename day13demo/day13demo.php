<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<?php
// toan tu
$number1 = 5;
$number2 = 2;
$result1 = $number1 + $number2;
$result2 = $number1 - $number2;
$result3 = $number1 * $number2;
$result4 = $number1 / $number2;
$result5 = $number1 % $number2;
$number1++;// chưa tăng lên ++[biến] đã tăng
$number2--;
echo "Tổng = $result1 <br>";
echo "Tổng = $result2 <br>";
echo "Tổng = $result3 <br>";
echo "Tổng = $result4 <br>";
echo "Tổng = $result5 <br>";
echo "Tích lũy lên 1 = $number1 <br>";
echo "Tích lũy xuống 1 = $number2 <br>";
// 2 - 4*(4/2 +2)

$number1 = 5;
$number2 = 2;
$result = $number1 < $number2;
echo " $result <br>";
$result = $number1 == $number2;
echo " $result <br>";
$result = $number1 > $number2;
echo " $result <br>";

$number1 = 4;
$number2 = -2;
$result1 = ($number1 != 0) && ($number2 == 0);
$result1 = ($number1 != 0) || ($number2 == 0);
// 4 toán tử gán
$number1 = 4;
$number1 += 2;
echo $number1 > 0 ? ">0" : "<=0";
echo "<br>";
$number1 = 10;
$number2 = 7;
$sum = $number1 + $number2;
echo "<div style = 'color : red'> ";
echo "$number1 + $number2 = $sum";
echo "<br>";
$number1 = 10;
$number2 = 7;
$sum = $number1 - $number2;
echo "$number1 - $number2 = $sum";
echo "<br>";
$sum = $number1 * $number2;
echo "$number1 * $number2 = $sum";
echo "<br>";
$sum = $number1 / $number2;
echo "$number1 / $number2 = $sum";
echo "<br>";
$sum = $number1 % $number2;
echo "$number1 % $number2 = $sum";
echo "<br>";
$number = 8;
echo "Giá trị ban đầu là $number" . "<br>";
$number += 2;
echo "Cộng thêm 2 giá trị hiện tại là $number" . "<br>";
$number -= 4;
echo "Trừ đi 4 giá trị hiện tại là $number" . "<br>";
$number *= 5;
echo "Nhân với 5 giá trị hiện tại là $number" . "<br>";
$number /= 3;
echo "Chia cho 3 giá trị hiện tại là $number" . "<br>";

++$number;
echo "Tăng lên 1 giá trị hiện tại là $number" . "<br>";
--$number;
echo "Giảm xuống 1 giá trị hiện tại là $number" . "<br>";


echo "</div>";
$number = 1;
if ($number > 0) {
    echo "<p> >0 </p>";
} else {
    echo "<p> <0 </p>";
}
?>
<?php if ($number > 0): ?>
    <p> > 0</p>
<?php else : ?>
    <p> <0</p>
<?php endif; ?>

<?php
if ($number == 0) {
    echo "$number 0";
} elseif ($number == 2) {
    echo "$number 2";
} elseif ($number == 1) {
    echo "$number 1";
} else {
    echo "###";
}

?>
<?php if ($number == 0): ?>
    <?php elseif ($number == 2): ?>
        <?php elseif ($number == 1): ?>
        <?php else: ?>
        <?php endif; ?>

        <?php if ($number > 0): ?>
            <ul>
                <li><a href="#"></a></li>
                <li><a href="#"></a></li>
                <li><a href="#"></a></li>
                <li><a href="#"></a></li>
            </ul>
        <?php endif; ?>
<?php
    $number =10;
    $i=1;
    //countinue break
for ($i=1; $i<=100; $i++){
    if ($i %2 == 0){
        echo "$i ";
    }
}
$is_primary = true;
function primary ($n)
{
    for ($i = 2; $i<sqrt($n);$i++) {
        if ($n % $i = 0) {
            $is_primary = false;
            break;
        }
    }
}
primary($number);
if ($is_primary == true) {
}
?>

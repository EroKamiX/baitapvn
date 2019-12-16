<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<?php
$arrs = [12, 50, 60, 90, 12, 25, 60];
$plus = 0;
$mutil = 1;
foreach ($arrs as $key){
    $plus+= $key;
    $mutil *= $key;
}
echo "$plus <br> $mutil ";
?>

<?php
$arrs = ['đỏ', 'xanh', 'cam', 'trắng'];
$value1 = $arrs[0];
$value2 = $arrs[1];
$value3 = $arrs[2];
$value4 = $arrs[3];
echo "Màu <span style='color: red'>$value1</span> là màu yêu thích của Anh, <span style='color: red'>$value4</span> là màu yêu thích của Sơn, <span style='color: red'>$value3</span> là màu yêu thích của Thắng, còn màu yêu thích của tôi là màu <span style='color: red'>$value2</span>";

?>
<?php
$arrs = ['PHP', 'HTML', 'CSS', 'JS'];
?>
<table border="1" cellspacing="0" cellpadding="5">
    <tr>
        <th>Ten khoa hoc</th>
    </tr>
    <?php foreach ($arrs as $value): ?>
    <tr>
        <td> <?php echo $value;?></td>
    </tr>
    <?php endforeach; ?>

</table>
<?php
$arr = [1,2,4,5,6];
echo array_sum($arr);

$arr = [
    'name' => 'manh',
    'age' => 19,
];
var_dump(array_key_exists('das',$arr));
var_dump(array_search('1df', $arr));
$arrr = [1,1,2,4,5,3];
$arrr = array_unique($arrr);
echo "<pre>";
print_r($arrr);
echo "</per>";
echo end($arrr);
?>


<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<?php
$keys = array(
    "field1"=>"first",
    "field2"=>"second",
    "field3"=>"third"
);
$values = array(
    "field1value"=>"dinosaur",
    "field2value"=>"pig",
    "field3value"=>"platypus"
);
$keysAndValue = array_combine($keys,$values);
echo "<pre>";
print_r($keysAndValue);
echo "</pre>";
//bài 7
$array = [12, 5, 200, 10, 125, 60, 90, 345, -123, 100,  -125, 0];
foreach ($array as $value){
    if ($value >= 100 && $value <= 200 && $value %5 == 0){
        echo $value." ";
    }
}
//bài 8
$array = ['programming', 'php', 'basic', 'dev', 'is', 'program is PHP'];
$max = 0;
$str_max = "";
foreach ($array as $string){
    if (strlen($string) >=$max){
        $max = strlen($string);
        $str_max = $string;
    }
}
echo "chuỗi có độ dài lớn nhất là $str_max và độ dài là $max";
//bài 9
$array = ['A','B','C','a'];
function converArrayToLower($array){
    $array_result = [];
    foreach ($array as $value){
        $value_lower = strtolower($value);
        $array_result[] = $value_lower;
    }
    return $array_result;
};
echo "<pre>";
print_r(converArrayToLower($array));
echo "</pre>";
?>



<?php
$arr_for =[1,2,3,4,5,6,7,8,9,10];
$count = count($arr_for);
for ($key = 0 ; $key <$count;$key++){
    echo $arr_for[$key];
}
foreach ($arr_for as $key => $value) {
    echo "Vi tri $key dang co gia tri la" . $value;
    echo "<br>";
}
$name_arr =['name 1','name 2'];
foreach ($name_arr as $name) {
    echo "$name <br>"    ;
}
$arr3 =[
    'name' => 'tu anh',
    'age' => 18,

];
foreach ($arr3 as $key => $value){
    echo " cho ra vi tri $key hien tai dang co gia tri la $value";
    echo "<br>";
}
$arr4 = [
    'name' => 'tu anh',
    'age' => [
        0 => 18,
        1 => 29,
    ]
];
echo "<pre>";
print_r($arr4);
echo "</pre>";
echo $arr4['age'][1];
foreach ($arr4 as $key => $value) {
    print_r($value);
    echo "<br>";
}
$arr5 = [
    'student' => [
        'room' => [
            'id' => 123,
            'floor' =>3,
        ] ,
        'info' => [
            'name' => 'tu anh',
            'address' => 'ha noi'
        ]
    ],
    'class' => 'php1019e2'
];
echo $arr5 ['student']['room']['floor'];
echo $arr5 ['student']['info']['hanoi'];
print_r($arr5 ['student']['room']);
?>
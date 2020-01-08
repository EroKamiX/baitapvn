<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<?php
/**
 * hàm tính toán
 * @param $arrs array mang can tinh toan
 * @param $operator phep toan tu
 * @return string ket qua bai toan
 */
$arrs = [2, 5, 6, 9, 2, 0, 6, 12 ,5];
function math($arrs,$operator){
    $string = '';


        switch ($operator){
            case '+':
                $result = 0;
                foreach ($arrs as $key => $value){
                    $result+= $value;
                    $string .= "$value + ";
                }
                $string = 'tổng các phần tử = ';

                break;
            case '-':
                $result = $arrs[0];
                $string = 'hiệu các phần tử = ';
                foreach ($arrs as $key => $value) {
                    $string .= "$value - ";
                    if ($key == 0) {
                        continue;
                    }
                    $result -= $value;
                }
                    // xóa chuỗi }
//                    $string = substr($string,0,-2);
//                    $string .= " = ".$result;

                break;
            case '*':
                $result = 1;
                $string = 'Tích các phần tử =';
                foreach ($arrs as $value){
                    $string .= "$value *";
                    $result *=$value;
                }
                break;
            case '/':
                $result = $arrs[0];
                $string = 'thương các phần tử =';
                foreach ($arrs as $key => $value){
                    if ($value == 0 ){
                        continue;
                    }
                    $string .= "$value / ";
                    if ($key == 0) {
                        continue;
                    }
                    $result /= $value;
                }
                break;
        }
    $string = substr($string,0,-2);
    $string .= " = ".$result."<br>";

    return $string;
}
echo math($arrs,'+');
echo math($arrs,'-');
echo math($arrs,'*');
echo math($arrs,'/');
?>
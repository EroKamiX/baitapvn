<?php
function number($n){
    $result = "";
    for ($i = 1; $i <= $n;$i++) {
        $result .= $i;
        if ($i == $n) {
            break;}
        else {
            $result .= "+";
        }
    }
    return $result;
}
$display = number(50);
echo $display;
?>

<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<style type="text/css" rel="stylesheet">
    .green {
        background: greenyellow;
    }
</style>
<?php

    function primary($n){
        $is_primary = true;
        if ($n < 2 ){
            $is_primary = false;
        }
        else {
            for ($i = 2; $i <= sqrt($n); $i++) {
                if ($n % $i == 0) {
                    $is_primary = false;
                    break;
                }
            };
        }
        return $is_primary;
    };

?>
<table border="1" cellpadding="5" cellspacing="0">
     <?php for ($row = 1; $row <= 10; $row++): ?>
        <tr> <?php for ($col = 1; $col <= 10; $col++):
                $number = ($row -1)*10 + $col;
                $class ='';
                if (primary($number) == true) {
                $class = "class='green'";
                }?>
            <td <?php echo $class ?>>
                <?php
                echo $number;
                ?>
            </td>
        <?php endfor; ?>

        </tr>
    <?php endfor; ?>
</table>
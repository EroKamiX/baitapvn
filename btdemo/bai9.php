<table border="1" cellspacing="0" cellpadding="auto">
    <tr>
    <?php for ($i=1; $i<=5;$i++):?>
    <td class="number"><?php echo $i."<br>"?>
            <?php for ($j=1;$j<=10;$j++):?>

                <?php
                $k=$i*$j;
                echo "$i x $j = $k <br>";
                ?>
            <?php endfor; ?>
        </td>
<?php endfor;?>
    </tr>
    <tr>
        <td class="number"><?php echo $i."<br>"?></td>
        <td><?php for ($i=6; $i<=10;$i++):?>

                <?php for ($j=1;$j<=10;$j++):?>

                    <?php
                    $k=$i*$j;
                    echo "$i x $j = $k <br>";
                    ?>
                <?php endfor; ?>
            </td>
        <?php endfor;?>
    </tr>
</table>
<style>
    .number {
        text-align: center;
        background: #CEFEFF;
    }
</style>
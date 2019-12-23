<style>
    .black {
        background: black;
    }
    .white {
        background: white;
    }
</style>
<table border="1" cellpadding="20" cellspacing="0">

<?php for ($row = 1; $row <=8; $row++): ?>
    <tr>
        <?php for ($col =1; $col <=8;$col ++) : ?>
        <?php
         if ($row % 2 == 0 ){
             if ($col %2 == 0 ){
                 echo "<td class='black'></td>";
             }
             else  {
                 echo "<td class='white'></td>";
             }
         }
         else{
             if ($col %2 != 0 ){
                 echo "<td class='black'></td>";
             }
             else  {
                 echo "<td class='white'></td>";
             }
         }
            ?>
        <?php endfor; ?>
    </tr>
<?php endfor;?>
</table>
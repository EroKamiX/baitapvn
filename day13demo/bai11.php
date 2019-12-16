<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<style type="text/css" rel="stylesheet">
    .black {
        background: black;
    }
</style>

<table border="1" cellpadding="5" cellspacing="0">
    <?php for ($row = 1; $row <= 10; $row++): ?>
        <tr> <?php for ($col = 1; $col <= 10; $col++):
               if ($col)?>
                <td <?php ?>>
                </td>
            <?php endfor; ?>

        </tr>
    <?php endfor; ?>
</table>
<?php
/**
 * Created by PhpStorm.
 * User: Hoc vien
 * Date: 2/28/2020
 * Time: 8:13 PM
 */
?>
<!doctype html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<h3 class="header">Day la header chung</h3>

<h3 style="color:red;">
    <?php
    if (isset($_SESSION['error']))
    {
        echo $_SESSION['error'];
        unset($_SESSION['error']);
    }
        ?>
</h3>
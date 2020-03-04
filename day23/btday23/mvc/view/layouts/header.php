<?php
/**
 * Created by PhpStorm.
 * User: tu901
 * Date: 2/29/2020
 * Time: 4:33 PM
 */
?>
<head>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<h3 class="header">Header chung</h3>
<h3 class="error">
    <?php
        if (isset($_SESSION['error'])){
            echo $_SESSION['error'];
            unset($_SESSION['error']);
        }
    ?>
</h3>
<h3 class="success">
    <?php
    if (isset($_SESSION['success'])){
        echo $_SESSION['success'];
        unset($_SESSION['success']);
        }
    ?>
</h3>

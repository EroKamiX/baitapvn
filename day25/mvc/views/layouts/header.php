<html>
    <head>
        <base href="<?php echo $_SERVER['SCRIPT_NAME']?>">
        <title>Demo MVC</title>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <link rel="stylesheet" href="assets/css/style.css" />
    </head>
    <body>
        <h3 class="header">Đây là header</h3>
<!--   Nội dung chính của từng trang     -->
        <h3 style="color: red">
            <?php echo $this->error ?>
            <?php
            if (isset($_SESSION['error'])) {
                echo $_SESSION['error'];
                unset($_SESSION['error']);
            }
            ?>
        </h3>
        <h3 style="color: green">
            <?php
            if (isset($_SESSION['success'])) {
                echo $_SESSION['success'];
                unset($_SESSION['success']);
            }
            ?>
        </h3>

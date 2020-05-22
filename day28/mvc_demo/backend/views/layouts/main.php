<?php
//views/layouts/main.php
//chứa toàn bộ cấu trúc HTML của hệ thống
//nhúng các file header.php, breadcrumb.php vào đây
//để tạo ra 1 cấu trúc HTML hoàn chỉnh
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/css/all.min.css">
    <link rel="stylesheet" href="assets/css/AdminLTE.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="assets/css/_all-skins.min.css">
    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
<!--    HEADER-->
    <?php
    require_once 'views/layouts/header.php';
    ?>
<!--    END HEADER-->
    <!-- Left side column. contains the logo and sidebar -->
    <?php
    require_once 'views/layouts/left_sidebar.php';
    ?>

    <!-- Breadcrumd Wrapper. Contains breadcrumb -->
    <?php
    require_once 'views/layouts/breadcrumb.php';
    ?>

    <!-- Messaeg Wrapper. Contains messaege error and success -->
    <?php
    require_once 'views/layouts/error.php';
    ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
<!--            Nội dung hiển thị ở đây-->
            <?php
            //sử dụng cơ chế render/hiển thị view động
            //dựa vào nội dung view hiện tại
//            $this chính là đối tượng controller tương ứng
            echo $this->content;
            ?>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <?php
    require_once 'views/layouts/footer.php';
    ?>
    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="assets/js/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="assets/js/jquery-ui.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="assets/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="assets/js/adminlte.min.js"></script>
<script src="assets/ckeditor/ckeditor.js"></script>
<script src="assets/js/script.js"></script>
</body>
</html>

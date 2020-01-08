<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<?php
const DB_HOST = 'localhost';
const DB_USERNAME = 'root';
const DB_PASSWORD = '';
const DB_NAME = 'bai1';
const DB_PORT = 3306;
$connection = mysqli_connect(DB_HOST,DB_USERNAME,
    DB_PASSWORD,DB_NAME,DB_PORT);
if (!$connection) {
    die("Lỗi, Chi tiết " . mysqli_connect_error());
}
else {
    mysqli_query($connection, "SET NAMES 'utf8' ");
    echo "kết nói thành công";
}
?>

<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<?php
CONST  DB_HOST = "localhost";
CONST DB_USERNAME = 'root';
CONST DB_PASSWORD = '';
const DB_NAME ='db_19';
const DB_PORT = 3306;
$connection =mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME,DB_PORT);
if (!$connection){
    die("kết nối thất bại, chi tiết lỗi: " .mysqli_connect_error());
}

    echo "kết nối ". DB_NAME. " thành công";
mysqli_query($connection, "SET NAME 'utf8'");
$sql_insert = "INSERT INTO students(`name`,`age`)
                VALUE ('EROKAMI',18), ('HENTAIGAMI',69)";
$is_insert = mysqli_query($connection,$sql_insert);
echo "<br>";
if ($is_insert){
    echo "INSERT thành công";
}
else {
    echo "INSERT thất bại";
}
$sql_update = "UPDATE students SET `name` = 'New Name' WHERE id < 5";
$is_update = mysqli_query($connection,$sql_update);
echo "<br>";
if ($is_update){
    echo "UPDATE thành công";
}
else {
    echo "UPDATE thất bại";
}
echo "<br>";
$sql_del = "DELETE FROM students WHERE id > 5";
$is_del = mysqli_query($connection,$sql_del);
if ($is_del){
    echo "DELETE thành công";
}
else {
    echo "DELETE thất bại";
}
$sql_select  = "SELECT * FROM students";
$result = mysqli_query($connection,$sql_select);
//echo '<pre>';
//print_r($result);
//echo '</pre>';
if (mysqli_num_rows($result) > 0){
    $students = mysqli_fetch_all($result,MYSQLI_ASSOC);
    foreach ($students as $student){
        echo "Tên: {$student['name']}";
        echo "<br>";
        echo "ngày tạo: {$student['age']}";
        echo "<br>";
//        $created_at = $students['created_at'];
        $created_at = date('d-m-Y H:i:s',strtotime($student['created_at']));
        echo "ngày tạo: $created_at";
    }
}
else {
    echo "Không có dữ liệu trả về";
}
?>
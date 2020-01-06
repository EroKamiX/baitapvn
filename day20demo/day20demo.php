<?php


?>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<?php
const DB_HOST = 'localhost';
const DB_USERNAME = 'root';
const DB_PASSWORD = '';
const DB_NAME = 'db_19';
const DB_PORT = 3306;
$connection = mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME,DB_PORT);
if (!$connection) {
    die("Lỗi, Chi tiết " . mysqli_connect_error());
}
mysqli_query($connection, "SET NAMES 'utf8' ");
echo "kết nói thành công";
if (isset($_GET['submit'])) {
    $name = $_GET['name'];
    $name = mysqli_real_escape_string($connection,$name);
    $sql_select = "SELECT * FROM students WHERE `name` LIKE '%$name%'";
    $result = mysqli_query($connection, $sql_select);
    if (mysqli_num_rows($result) > 0) {
        $students = mysqli_fetch_all($result, MYSQLI_ASSOC);
        echo "<br>";
        print_r($sql_select);
//    echo "<pre>";
//    print_r($students);
//    echo "</pre>";
    }
}
?>
<table border="1" cellspacing="0"cellpadding="6">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Age</th>
        <th>Created at</th>
    </tr>
    <?php if(empty($students)) :?>
        <tr>
            <td colspan="4">Khong co sinh vien nao</td>
        </tr>
    <?php else: ?>
        <?php foreach ($students as $student) :?>
            <tr>
                <td>
                    <?php echo $student['id']?>
                </td>
                <td>
                    <?php echo $student['name']?>
                </td>
                <td>
                    <?php echo $student['age']?>
                </td>
                <td>
                    <?php echo $student['created_at']?>
                </td>


            </tr>
        <?php endforeach;?>
    <?php endif;?>
</table>

<form method="get" action="">
    Name can tim kiem
    <input type="text" name="name" id="">
    <input type="submit" value="Search" name="submit">
</form>

<?php
session_start();
if (!isset($_GET['id'])){
    $_SESSION['error'] = 'Id Khong ton tai';
    header('Location:index.php');
    exit();
}
elseif (!is_numeric($_GET['id'])) {
    $_SESSION['error'] = 'ID phai la so';
}
$id = $_GET['id'];
require_once 'crud.php';
$sql_select = "SELECT * FROM students WHERE id = $id";
$result = mysqli_query($connection,$sql_select);
$student = [];
if (mysqli_num_rows($result)>0){
    $students = mysqli_fetch_all($result,MYSQLI_ASSOC);
    $student = $students[0];

}
?>
<h3>Thong tin chi tiet</h3>
<?php if (empty($student)): ?>
<?php else : ?>
<table border="1" cellpadding="5" cellspacing="0">
    <tr>
        <th>ID</th>
        <td><?php echo $student['id'] ?></td>
    </tr>
    <tr>
        <th>Name</th>
        <td><?php echo $student['name'] ?></td>
    </tr>
    <tr>
        <th>Age</th>
        <td><?php echo $student['age'] ?></td>
    </tr>
    <tr>
        <th>Created_at</th>

        <td><?php
            echo  date("d-m-Y H:i:s", strtotime($student['created_at']));?></td>
    </tr>
</table>

<?php endif;?>
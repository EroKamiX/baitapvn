<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<?php
session_start();
require_once ('crud.php');
$sql_select = "SELECT * FROM students";
$result = mysqli_query($connection,$sql_select);
$students = [];
if (mysqli_num_rows($result)){
    $students = mysqli_fetch_all($result,MYSQLI_ASSOC);
//    echo '<pre>';
//    print_r($students);
//    echo '</pre>';
}
?>
<h3 style="color: red"><?php if (isset($_SESSION['error'])){
        echo $_SESSION['error'];
        unset($_SESSION['error']);
    }?></h3>
<h3 style="color: green"><?php if (isset($_SESSION['success'])){
        echo $_SESSION['success'];
        unset($_SESSION['success']);
    }?></h3>
<a href="creat.php">Thêm mới</a>
<h2>Danh sách sinh viên</h2>
<table border="1" cellpadding="8" cellspacing="0">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Age</th>
        <th>Created_at</th>
        <th>Action</th>
    </tr>
    <?php if (empty($students)):?>
        <tr>
            <td colspan="5">Không có sinh viên nào</td>
        </tr>
    <?php else :?>
    <?php foreach ($students as $student) :?>
    <tr>
        <td>
            <?php echo $student['id']?>
        </td>
        <td><?php echo $student['name']?></td>
        <td><?php echo $student['age']?></td>

        <td><?php echo date('d:m:Y H:i:s', strtotime($student['created_at']))?></td>
        <td>
            <a href="detail.php?id=<?php echo $student['id']; ?>">Chi tiết</a>
            <a href="update.php?id=<?php echo $student['id']; ?>">Cập nhật</a>
            <a href="delete.php?id=<?php echo $student['id']; ?>" onclick="return confirm('Do U WANNA DELETE?')">Xóa</a>
        </td>
    </tr>
            <?php endforeach;?>
    <?php endif;?>
</table>
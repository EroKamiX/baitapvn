<?php
session_start();
if (!isset($_GET['id'])){
    $_SESSION['error'] = "ID NOT EXIST";
}
else {
    require_once 'crud.php';
    $id =$_GET['id'];
    $sql_select = "SELECT * FROM employees WHERE id= $id";
    $result = mysqli_query($connection,$sql_select);
    $employee=[];
    if (mysqli_num_rows($result)>0){
        $employees = mysqli_fetch_all($result,MYSQLI_ASSOC);
        $employee = $employees[0];
    }

}
?>
<link rel="stylesheet" href="css/bootstrap.min.css">
<div class="container">
    <h3>View Record</h3>
    ID <br>
    <?php echo $employee['id']?><br>
    Name <br>
    <?php echo $employee['name']?><br>
    Description <br>
    <?php echo $employee['description']?><br>
    Salary <br>
    <?php echo $employee['salary']?><br>
    Gender <br>
    <?php if ($employee['gender'] == 1){
        echo "Male";
    }
    else {
        echo "Female";
    }?><br>
    Birthday <br>
    <?php echo date("d/m/Y", strtotime($employee['birthday']))?><br>
    Created_at <br>
    <?php echo date("d/m/Y H:i:s", strtotime($employee['created_at'])) ?><br>
    <button class="btn btn-primary"><a href="index.php" style="color: white">Back</a></button>
</div>

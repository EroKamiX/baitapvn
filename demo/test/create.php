<?php
/**
 * Created by PhpStorm.
 * User: Hoc vien
 * Date: 5/8/2020
 * Time: 7:02 PM
 */
session_start();
require_once 'database.php';
$error ='';
if (isset($_POST['submit'])) {
    echo "<pre>";
    print_r($_POST);
    print_r($_FILES);
    echo "</pre>";
    $avatar = $_FILES['avatar'];
    if (empty($_POST['title'])) {
        $error = "Nhap title";
    } elseif ($avatar['error'] == 0) {
        $extension_arr = ['png', 'jpg', 'jpeg', 'gif'];
        $extension = pathinfo($avatar['name'], PATHINFO_EXTENSION);
        $extension = strtolower($extension);
        if (!in_array($extension, $extension_arr)) {
            $error = "Can upload file anh";
        }
    }
    if (empty($error)) {
        $file = '';
        if ($avatar['error'] == 0) {
            $dir_upload = __DIR__ . "/upload/";
            if (!file_exists($dir_upload)) {
                mkdir($dir_upload);
            }
            $file = time() . "-" . $avatar['name'];
            move_uploaded_file($avatar['tmp_name'], $dir_upload . $file);
        }
        $obj_insert = $connection->prepare("INSERT INTO book (`title`,`avatar`) VALUES (:title,:avatar)");
        $insert_arr = [
            ':title' => $_POST['title'],
            ':avatar' => $file,
        ];
        $is_insert = $obj_insert->execute($insert_arr);
        if (!$is_insert) {
            $_SESSION['error'] = "Insert khong thanh cong";
        } else {
            $_SESSION['success'] = "Insert thanh cong";
        }
        header("Location: index.php");
        exit();
    }

}
?>
<h3 style="color: red"><?php echo $error; ?></h3>
<form action="" method="post" enctype="multipart/form-data">

    <div>
        Title
        <input type="text" name="title" id="">
    </div>
    <div>Avatar:
        <input type="file" name="avatar" id="">
    </div>
    <div>
        <input type="submit" value="Save" name="submit">
        <input type="reset" value="Reset" name="Reset">
    </div>
</form>

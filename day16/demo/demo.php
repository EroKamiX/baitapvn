<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<?php
 $result ="";
 $error ="";
 if (isset($_POST['submit'])){
     echo "<pre>";
     print_r($_POST);
     echo "</pre>";
     echo "<pre>";
     print_r($_FILES);
     echo "</pre>";
     $avt_arr =$_FILES['avatar'];

     if ($avt_arr['error'] != 0){
     $error = "Không thể upload file";
     }
     else {
         $extension = pathinfo($avt_arr['name'], PATHINFO_EXTENSION);
//         print_r($extension);
//         die;
         $size = $avt_arr['size'] / 1024 / 1024;
         $arr_extension = ['png', 'jpeg', 'jpg', 'gif'];
         if (!in_array($extension, $arr_extension)) {
             $error = "cần upload file ảnh ";
         } elseif ($size > 2) {
             $error = "file chỉ đc nhỏ hơn 2 mb";
         } else {
             //tạo một thư mục lưu file upload
             // sử dụng đường dẫn vật lý
             $dir_upload = __DIR__ . "/upload";
             print_r($dir_upload);
             if (file_exists($dir_upload) == false) {
                 mkdir($dir_upload);
             }
             $file_name = time() . $avt_arr['name'];
             $tmp_name = $avt_arr['tmp_name'];
             $destination = $dir_upload . "/" . $file_name;
             $is_upload = move_uploaded_file($tmp_name, $destination);
             if ($is_upload) {
                 $result = "upload file thành công";
             } else {
                 $error = "Không thể upload file";
             }
         }
     }
 }
?>
<h3 style="color: green"><?php echo $result?></h3>
<h3 style="color: red"><?php echo $error?></h3>
<form action="" method="post" enctype="multipart/form-data">
    Upload avatar
    <input type="file" name="avatar"/>
    <br>
    <input type="submit" name="submit" value="Submit">
</form>

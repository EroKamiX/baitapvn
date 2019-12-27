<!--chưa bài tập 1-->
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<?php
$error ='';
$result = '';
 if (isset($_POST['upload'])){
    echo "<pre>";
    echo print_r($_FILES);
    echo "</pre>";
    if ($_FILES['avatar']['error'] == 0){
        $extention = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
        $extention = strtolower($extention);
        $arr_extention = ['jpg', 'jpeg', 'png','gif'];
        if (!in_array($extention,$arr_extention)){
            $error = "cần upload file ảnh ";
        }
        elseif ($_FILES['avatar']['size'] > 10*1024*1024){
            $error ="File vượt quá 1 MB";
        }
        else {
            $dir_upload = __DIR__ . "/upload";
            if (!file_exists($dir_upload)){
                mkdir($dir_upload);
            }
            $file = time() . $_FILES['avatar']['name'];
            $is_upload = move_uploaded_file($_FILES['avatar']['tmp_name'],$dir_upload.'/'.$file);
            if ($is_upload){
                $result .= 'Avatar của bạn là';
                $result .= "<img src='upload/$file' height='200'>";
                $result .= "<br>";
                $result .= $file . '<br>';
                $result .= $extention;
                $result .= "<br>";
                $result .= "Đường dẫn file vật lý" . $dir_upload  . '/' . $file;
                $result .= "<br>";
                $size = round($_FILES['avatar']['size'] / 1024 / 1024,2);
                $result .= $size .'MB';
            }
            else {
                $error = 'Không thể upload file ';
            }
        }
    }
    else{
        $error = "Có lỗi gì đó";
    }

 }
?>
<div style="color: green"><?php echo $result?></div>
<div style="color: red"><?php echo $error?></div>
<form action="" method="post" enctype="multipart/form-data">
    <input type="file" name="avatar">
    <br>
    Only jpg, jpeg, png and gif with maximum file of 1MB is allowed
    <br>
    <input type="submit" value="Upload" name="upload" />
</form>

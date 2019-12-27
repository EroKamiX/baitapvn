<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<?php
 setcookie('username','Tú Anh',time() +3600);

setcookie('username','',time() -1);
if (isset($_COOKIE['username'])){
    $username = $_COOKIE['username'];
    echo $username;
}
 ?>
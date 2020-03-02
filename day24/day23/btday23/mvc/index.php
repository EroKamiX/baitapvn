<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="assets/css/fontawesome.min.css">
<link rel="stylesheet" type="text/css" href="assets/css/all.min.css">
<?php
/**
 * Created by PhpStorm.
 * User: tu901
 * Date: 2/29/2020
 * Time: 3:35 PM
 */
$controller = isset($_GET['controller']) ? $_GET['controller'] :'employee';
$action = isset($_GET['action']) ? $_GET['action'] : 'listEmployee';
$controller = ucfirst($controller);
$controller .= 'Controller';
$path_controller = 'controllers/'.$controller. '.php';
if (!file_exists($path_controller)){
    die('Trang Ban Tim Khong Ton tai');
}
require_once "$path_controller";
$object = New $controller;
if (!method_exists($object,$action)){
    die("Phuong thuc khong hop le");
}
$object->$action();
?>


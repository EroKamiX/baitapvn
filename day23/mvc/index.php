<?php
/**
 * Created by PhpStorm.
 * User: Hoc vien
 * Date: 2/28/2020
 * Time: 8:13 PM
 */
//index.php?controller=book&action=create
$controller =isset($_GET['controller']) ? $_GET['controller'] : 'book';
$action =isset($_GET['action']) ? $_GET['action'] : 'create';
print_r($controller);
print_r($action);
echo '<br>';
$controller = ucfirst($controller);
$controller .= "controller";
$path_controller = "controllers/" . $controller. ".php";

if (!file_exists($path_controller)){
    die("Trang ban tim Khong Ton tai");
}
require_once "$path_controller";
$object = New $controller();
//kiem tra phuong thuc co ton tai hay ko
if (!method_exists($object,$action)){
    die("Khong ton tai phuong thuc $action trong controller");
}
$object->$action();
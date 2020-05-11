
<?php
session_start();
date_default_timezone_set("Asia/Ho_Chi_Minh");
$controller = isset ($_GET['CategoryController']) ? $_GET['CategoryController'] : 'Category';
$action = isset ($_GET['action']) ? $_GET['action'] : 'index' ;
$controller= ucfirst($controller);
$controller .= 'Controller';
$path_controller = "controllers/$controller.php";
if (!file_exists($path_controller)) {
    header("Location: index.php?action=error404");
    die();
}
require_once $path_controller;
$object = New $controller;
if (!method_exists($object, $action)) {
    header("Location: index.php?action=error404");
    die("Phuong thuc khong hop le");
}
$object->$action();
?>
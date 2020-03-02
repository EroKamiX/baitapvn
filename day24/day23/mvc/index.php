<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<?php
session_start();
/**
 * Created by PhpStorm.
 * User: Hoc vien
 * Date: 2/28/2020
 * Time: 8:13 PM
 */
//index.php?controller=book&action=create
$controller = isset($_GET['controller']) ? $_GET['controller'] : 'book';
$action = isset($_GET['action']) ? $_GET['action'] : 'create';
$controller = ucfirst($controller);
$controller .= "Controller";
$path_controller = "controllers/$controller". ".php";
if (!file_exists($path_controller)){
    die("trang ban tim khong ton tai");
}
require_once "$path_controller";
$object = new $controller() ;
if (!method_exists($object,$action)){
    die( "Phuong thuc khong hop le");
}
$object ->$action();
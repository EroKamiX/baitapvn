<?php
/**
 * Created by PhpStorm.
 * User: tu901
 * Date: 2/29/2020
 * Time: 3:25 PM
 */

require_once "model/employee.php";
class EmployeeController
{
    public function create()
    {

        if (isset($_POST['submit'])) {
            $employees_model = New employee();
            $error = $employees_model->error = '';
            if (empty($_POST['name'])) {
                $error = 'Không được để trống trường name';
            } elseif (empty($_POST['description'])) {
                $error = 'Không được để trống mô tả';
            } elseif (empty($_POST['salary'])) {
                $error = 'Không nhập khoản lương';
            } elseif (!isset($_POST['gender'])) {
                $error = 'Cần khai báo giới tính';
            } elseif (empty($_POST['birthday'])) {
                $error = 'Cần nhập ngày sinh';
            } else {
                $employees_model->name = $_POST['name'];
                $employees_model->description = $_POST['description'];
                $employees_model->salary = $_POST['salary'];
                $_POST['birthday'] = date("Y-m-d H:i:s", strtotime($_POST['birthday']));
                $employees_model->birthday =$_POST['birthday'];
                $employees_model->gender = $_POST['gender'];
                $is_insert = $employees_model->insert();
                var_dump($is_insert);
            }
            echo "<h3>$error</h3>";
        }
        require_once "view/employees/create.php";

    }
    public function listEmployee(){
        $employees_model = New employee();
        $is_select = $employees_model ->select();
        if (($is_select)) {
            $employees = $is_select->fetchAll(PDO::FETCH_ASSOC);
//            require_once "view/employees/list.php";
            echo "<pre>";
            print_r($employees);
            echo "</pre>";
        }
        else {
            echo "Chưa có danh sách nhân viên";
            $this->create();
        }
    }
}
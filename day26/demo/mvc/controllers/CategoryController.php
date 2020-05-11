<?php
/**
 * Created by PhpStorm.
 * User: tu901
 * Date: 2/29/2020
 * Time: 3:25 PM
 */
require_once 'controllers/Controller.php';
require_once 'models/Category.php';
class CategoryController  extends Controller
{
    public $error;
    public function error404() {
        $this->content = $this->render('views/pages/404.php');
        require_once 'views/layouts/main.php';
}
    public function index () {
        $news_model = New Category();
        $categories = $news_model ->GetAllNews();
//        echo '<pre>';
//        print_r($news);
//        echo  '</pre>';
        $this->content = $this->render('views/categories/index.php',[
            'categories' => $categories,
        ]);
        require_once 'views/layouts/main.php';
    }
    public function create() {
        if (isset($_POST['submit'])) {
            $user = $_POST['user'];
            $title = $_POST['title'];
            $description = $_POST['description'];
            $pic_des = $_FILES['pic_des'];
            $extension_arr = ['png','jpg','jpeg','gif'];
            if (empty($user)) {
                $this ->error  = 'Khai báo User';
            }
            elseif (empty($title)) {
                $this ->error  = 'nhap tieu de';
            }
            elseif (empty($description)) {
                $this->error = 'Can nhap mo ta';
            }
            elseif ($pic_des['error'] == 0 ) {
                $extension = pathinfo($pic_des['name'],PATHINFO_EXTENSION);
                if (!in_array($extension,$extension_arr)) {
                    $this ->error = 'Can upload dinh dang anh';
                }
            }
            if (empty($this->error)) {
                $file_name = '';
                if ($pic_des['error'] ==0) {
                $dir_upload = __DIR__ . '/../assets/upload';
                if (!file_exists($dir_upload)) {
                    mkdir($dir_upload);
                }
                $file_name = time() . '-'.$pic_des['name'];
                move_uploaded_file($pic_des['tmp_name'],$dir_upload.'/'.$file_name);
            }

            $news_model = New Category();
            $news_model->pic_des = $file_name;
            $news_model->user = $user;
            $news_model ->description = $description;
            $news_model ->title = $title;
            $is_insert = $news_model->insert();
            if ($is_insert) {
                $_SESSION['success'] = 'Insert thành công';
            } else {
                $_SESSION['error'] = 'Insert thất bại';
            }
            header("Location: index.php");
            exit();
            }
        }
        //lấy nội dung view create.php
        $this->content = $this->render('views/categories/created.php');
        //    //gọi layout để nhúng nội dung view create vừa lấy đc
        require_once 'views/layouts/main.php';

    }

    public function update() {
        if (!isset($_GET['id']) && !is_numeric($_GET['id'])) {
            $_SESSION['error']  = 'ID KHONG HOP LỆ';
            header( "Location: index.php");
           exit();
        }
        $id= $_GET['id'];
        $news_model = New Category();
        $category = $news_model->detail($id);
        if (!isset($category)){
            $_SESSION['error']  = 'Tin không tồn tại';
            header( "Location: index.php");
            exit();
        }
        if (isset($_POST['submit'])) {
            $user = $_POST['user'];
            $title = $_POST['title'];
            $description = $_POST['description'];
            $pic_des = $_FILES['pic_des'];
            $extension_arr = ['png','jpg','jpeg','gif'];
            if (empty($user)) {
                $this ->error  = 'Khai báo User';
            }
            elseif (empty($title)) {
                $this ->error  = 'nhap tieu de';
            }
            elseif (empty($description)) {
                $this->error = 'Can nhap mo ta';
            }
            elseif ($pic_des['error'] == 0 ) {
                $extension = pathinfo($pic_des['name'],PATHINFO_EXTENSION);
                if (!in_array($extension,$extension_arr)) {
                    $this ->error = 'Can upload dinh dang anh';
                }
            }
            $picture = $category['pic_des']  ;
            $file_name = $picture;
            if (empty($this->error)) {
                if ($pic_des['error'] ==0) {
                    $dir_upload = __DIR__ . '/../assets/upload';
                    if (!file_exists($dir_upload)) {
                        mkdir($dir_upload);
                    }
                    @unlink($dir_upload .'/'.$picture);
                    $file_name = time() . '-'.$pic_des['name'];
                    move_uploaded_file($pic_des['tmp_name'],$dir_upload.'/'.$file_name);
                }


                $news_model->pic_des = $file_name;
                $news_model->user = $user;
                $news_model ->description = $description;
                $news_model ->title = $title;
                $news_model ->updated_at = date('Y-m-d H:i:s');
                $is_update = $news_model->update($id);
                if ($is_update) {
                    $_SESSION['success'] = 'UPDATE thành công';
                } else {
                    $_SESSION['error'] = 'UPDATE thất bại';
                }
                header("Location: index.php");
                exit();
            }
        }
        $this->content = $this->render('views/categories/update.php', [
            'category' => $category
            ]);
        require_once 'views/layouts/main.php';

    }
    public function detail() {
        if (!isset($_GET['id']) && !is_numeric($_GET['id'])) {
            $_SESSION['error']  = 'ID KHONG HOP LỆ';
            header( "Location: index.php");
            exit();
        }
        $id= $_GET['id'];
        $news_model = New Category();
        $category = $news_model->detail($id);
//        echo '<pre>';
//        print_r($category);
//        echo '</pre>';
        if (!isset($category)){
            $_SESSION['error']  = 'Tin không tồn tại';
            header( "Location: index.php");
            exit();
        }
        $this->content = $this->render('views/categories/detail.php',[
            'category' => $category,
        ]);
        require_once 'views/layouts/main.php';
    }
    public function delete()
    {
        if (!isset($_GET['id']) && !is_numeric($_GET['id'])) {
            $_SESSION['error'] = 'ID KHONG HOP LỆ';
            header("Location: index.php");
            exit();
        }
        $id = $_GET['id'];
        $news_model = New Category();
        $category = $news_model->detail($id);
//        echo '<pre>';
//        print_r($category);
//        echo '</pre>';
        if (!isset($category)) {
            $_SESSION['error'] = 'Tin không tồn tại';
            header("Location: index.php");
            exit();
        }
        $is_delete = $news_model->delete($id);
        if ($is_delete) {
            $_SESSION['success'] = 'DELETE thành công';
        } else {
            $_SESSION['error'] = 'DELETE thất bại';
        }
        header("Location: index.php");
        exit();
    }
}
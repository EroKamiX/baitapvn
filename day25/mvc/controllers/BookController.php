<?php
require_once 'models/Book.php';
//controllers/BookController.php
//lưu ý tên class trong MVC sẽ trùng với tên file
class BookController
{

  //chứa thông tin liên quan đến lỗi
  public $error;
public function index () {
    $book_model = new Book();
    $books = $book_model->getAllBook();
    require_once "views/books/index.php";

}
  public function create()
  {

    //xử lý submit form từ view gửi lên
    if (isset($_POST['submit'])) {
      echo "<pre>";
      print_r($_POST);
      echo "</pre>";
      $name = $_POST['name'];
      $amount = $_POST['amount'];

      //xử lý validate:
//            1 - name không được để trống
//            2 - File phải có định dạng ảnh png, jpg, jpeg, gif
//            Nếu validate lỗi thì sẽ gán giá trị cho thuộc tính error
//            ,chỉ xử lý thêm vào CSDL khi error không có giá trị
      $avatar_arr = $_FILES['avatar'];
      $extension_arr = ['png', 'jpg', 'jpeg', 'gif'];
      //lấy ra đuôi file mà user tải lên
//            echo "<pre>";
//            print_r($avatar_arr);
//            echo "</pre>";
//            die;

//            var_dump($extension);
      if (empty($name)) {
        $this->error = "Name không được để trống";
      } elseif ($avatar_arr['error'] == 0) {
        $extension = pathinfo($avatar_arr['name'],
          PATHINFO_EXTENSION);
        if (!in_array($extension, $extension_arr)) {
          $this->error = "Phải upload định dạng ảnh";
        }
      }

      //trường hợp validate thành công, tương đương biến error đang rỗng
      if (empty($this->error)) {
        //upload ảnh
        //tạo thư mục uploads
//                    chú ý tạo thư mục thì phải là đường dẫn tuyệt đối
//        nếu có hành đông upload file, tương đương mang4 $_FILES của key error = 0 thì xử lý upload
        $file_name = '';
        if ($avatar_arr['error'] == 0) {
          $dir_uploads = __DIR__ . '/../assets/uploads';
          if (!file_exists($dir_uploads)) {
            mkdir($dir_uploads);
          }
          //tạo ra tên file ngẫu nhiên để tránh trường upload
//                    đè file giống nhau
          $file_name = time() . '-' . $avatar_arr['name'];
          move_uploaded_file($avatar_arr['tmp_name'],
            $dir_uploads . '/' . $file_name);
        }

        //lưu vào bảng books
        //gọi model Book
        $book_model = new Book();
        //gán giá trị cho các thuộc tính của model book
        $book_model->name = $name;
        $book_model->avatar = $file_name;
        $book_model->amount = $amount;
        //gọi phương thức insert đã tạo trong model Book
        $is_insert = $book_model->insert();
        if ($is_insert) {
          $_SESSION['success'] = 'Insert thành công';
        } else {
          $_SESSION['error'] = 'Insert thất bại';
        }
        //url luôn phải tuân theo format trong mvc, là phải có tham số
//                    controller và action
        header("Location: index.php?controller=book&action=create");
        exit();
      }

    }
//        echo "Đang ở trong phương thức create";
    //gọi view để hiển thị form thêm mới sách
    //đứng từ file index.php gốc của ứng dụng để nhúng file
//        views/books/create.php
    require_once 'views/books/create.php';
  }
    public function update(){
        if(!isset($_GET['id']) || !is_numeric($_GET['id'])){
            $_SESSION['error'] = "id không hợp lệ";
            header("Location: index.php");
            exit();
        }
        $id = $_GET['id'];
        $book_model = New Book();
        $book = $book_model->getBookID($id);
        echo "<pre>";
        print_r($book);
        echo "</pre>";
        if (isset($_POST['submit'])){
            $name = $_POST['name'];
            $amount = $_POST['amount'];
            $avatar_arr = $_FILES['avatar'];
            $extension_arr = ['png', 'jpg', 'jpeg', 'gif'];
            if (empty($name)) {
                $this->error = "Name không được để trống";
            }
            elseif ($avatar_arr['error'] == 0) {
                $extension = pathinfo($avatar_arr['name'],PATHINFO_EXTENSION);
                if (!in_array($extension,$extension_arr)){
                    $this->error = "Phải là định rạng ảnh";
                }
            }
            if (empty($this->error)) {
                $avatar = $book['avatar'];
                if ($avatar_arr['error'] == 0) {
                    $dir_uploads = __DIR__.'../assets/uploads';
                    if (!file_exists($dir_uploads)) {
                        mkdir($dir_uploads);
                    }
                    @unlink($dir_uploads."/".$avatar);
                    $file_name = time() . "-" . $avatar_arr['name'];
                    move_uploaded_file($avatar_arr['tmp_name'],$dir_uploads. "/". $file_name);
                }
            }
            $book_model->name = $name;
            $book_model->amount = $amount;
            $book_model->avatar = $$file_name;

            $is_update = $book_model->updateBook($id);
            if ($is_update) {
                $_SESSION['success'] = 'Sửa thành công';
            }
            else {
                $_SESSION['error'] = 'Sửa xịt';
            }
            header("Location: index.php");
            exit();
        }
        require_once "views/books/update.php";

    }
    public function delete() {
        if(!isset($_GET['id']) || !is_numeric($_GET['id'])){
            $_SESSION['error'] = "id không hợp lệ";
            header("Location: index.php");
            exit();
        }
        $id = $_GET['id'];
        $book_model = New Book();
        $book = $book_model->getBookID($id);
        $is_del = $book_model->delete($id);
        if ($is_del) {
            $_SESSION['success'] = "Xóa Thành công";
        }
        else {
            $_SESSION['error'] = "Xóa XỊt";
        }
        header("Location: index.php");
    }
}
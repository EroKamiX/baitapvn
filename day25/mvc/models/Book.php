<?php
//models/Book.php
class Book {
    const DB_DSN = 'mysql:host=localhost;dbname=book_mvc';
    const DB_USERNAME = 'root';
    const DB_PASSWORD = '';
    public $name;
    public $avatar;
    public $amount;
    public function getConnection() {
        try {
            $connection = new PDO(self::DB_DSN,
                self::DB_USERNAME, self::DB_PASSWORD);
            $connection ->exec("SET NAME utf8");
        } catch (PDOException $e) {
            die("Kết nối thất bại: " . $e->getMessage());
        }
        return $connection;
    }
    public function insert() {
        //chuẩn bị câu truy vấn
        $connection = $this->getConnection();
        $obj_insert = $connection
            ->prepare("INSERT INTO
  books(`name`, `avatar`, `amount`) VALUES (:name, :avatar, :amount)");
        //gán giá trị cho các tham số trong câu truy vấn
        $arr_insert = [
            ':name' => $this->name,
            ':avatar' => $this->avatar,
            ':amount' => $this->amount
        ];
        //thực thi câu truy vấn
        $is_insert = $obj_insert->execute($arr_insert);
        return $is_insert;
    }
    public function getAllBook() {
        $connection = $this->getConnection();
        $obj_select = $connection->prepare("SELECT * FROM books");
        $arr_select = [

        ];
        $obj_select->execute();
        $books = $obj_select->fetchAll(PDO::FETCH_ASSOC);
        return $books;
    }
    public function getBookID($id) {
        $connection = $this->getConnection();
        $obj_select = $connection->prepare("SELECT * FROM books WHERE id=:id");
        $arr = [
            ":id"=>$id
        ];
        $obj_select->execute($arr);
        $books = $obj_select->fetchAll(PDO::FETCH_ASSOC);
        return $books[0];
    }
    public function updateBook($id){
        $connection = $this->getConnection();
        $obj_update = $connection->prepare("UPDATE books SET `name` = :name, `amount`=:amount,`avatar` = :avatar WHERE id=:id");
        $arr = [
            ':name' => $this->name,
            ':avatar' => $this->avatar,
            ':amount' => $this->amount,
            ":id"=>$id
        ];
        return $obj_update->execute($arr);

    }
    public function delete($id) {
        $connection = $this->getConnection();
        $obj_delete = $connection->prepare("DELETE FROM books  WHERE id=:id");
        $arr = [
            ":id"=>$id
        ];
        return $obj_delete->execute($arr);
    }
}

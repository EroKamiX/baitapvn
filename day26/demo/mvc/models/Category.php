<?php
/**
 * Created by PhpStorm.
 * User: tu901
 * Date: 2/29/2020
 * Time: 3:26 PM
 */
require_once 'models/Model.php';
class Category extends Model
{

public $user;
public $title;
public $pic_des;
public $description;
public $updated_at;

    /**
     * @return mixed
     */
    public function insert()
    {
        $connection = $this ->connectDB();
        $obj_insert = $connection->prepare("INSERT INTO
        Categories(`title`,`pic_des`,`description`,`user`) VALUES (:title, :pic_des, :description, :user)");
        $arr_insert = [
            ':title' => $this ->title,
            ':pic_des' => $this ->pic_des,
            ':description' => $this ->description,
            ':user' => $this->user,
        ];
        $is_insert = $obj_insert->execute($arr_insert);
        return $is_insert;
    }
    public function GetAllNews () {
        $connection = $this->connectDB();;
        $obj_select = $connection->prepare("SELECT * FROM categories");
        $obj_select ->execute();
        $news = $obj_select->fetchAll(PDO::FETCH_ASSOC);
        return $news;
    }
    public function detail($id) {
        $connection = $this->connectDB();
        $obj_detail = $connection->prepare("SELECT * FROM categories WHERE id = $id");
        $detail_arr = [
            ":id" => $id,
        ];
        $obj_detail->execute($detail_arr);
        $categories = $obj_detail->fetchAll(PDO::FETCH_ASSOC);
        $category = $categories[0];
            return $category;

    }
    public function update($id) {
       $connection = $this->connectDB();
        $obj_update = $connection->prepare("UPDATE categories SET `title`= :title,`pic_des` = :pic_des,
        `description` = :description,`user` = :user, `update_at` = :update_at WHERE `id` = $id");
        $arr_update = [
            ':title' => $this ->title,
            ':pic_des' => $this ->pic_des,
            ':description' => $this ->description,
            ':user' => $this->user,
            ':update_at' => $this->updated_at,
        ];
        $is_update = $obj_update->execute($arr_update);
        return $is_update;
    }
    public function delete($id) {
        $connection = $this->connectDB();
        $obj_delete = $connection->prepare("DELETE FROM categories WHERE id=$id");
        $is_delete  = $obj_delete->execute();
        return $is_delete;
    }

}

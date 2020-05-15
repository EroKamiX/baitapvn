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
    public function getAll()
    {
        $connection = $this->connectDB();
        $obj_select = $connection->prepare("SELECT * FROM categories");
        $obj_select->execute();
        $categories = $obj_select->fetchAll(PDO::FETCH_ASSOC);
        return $categories;
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: Hoc vien
 * Date: 5/22/2020
 * Time: 7:59 PM
 */
class  Pagination {
    public $params= [
        'total' => 0,
        'limit' => 0,
        'query_string' => 'page',
        'controller' => '',
        'action' => '',
    ] ;
    public function __construct($params = []) // khoi tao thuoc tinh param
    {
//        validate trong mang param
            if ($params['limit'] < 0 ){
                die("tham so limit khong duoc am");
            }
        if ($params['total'] < 0 ){
            die("tham so total khong duoc am");
        }
        $this->params =$params;
    }
    public function getTotalPage() {
        $total = $this->params['total'] / $this->params['limit'];
        $total = ceil($total);
//        lam tron xuong floor
        return $total;

    }
    public function getCurrentPage() {
        $page = 1 ;
        if (isset($_GET['page']) && is_numeric($_GET['page'])) {
            $page = $_GET['page'];
            $total_page = $this->getTotalPage();
            if ($page >= $total_page) {
                $page=$total_page;
            }
        }
        return $page;
    }
    public function getPrevPage() {
        $prev_page = '';
        if($this->getCurrentPage() >= 2) {
            $url = "index.php?controler=".$this->params['controller']."&action=".$this->params['action']."&page=".($this->getCurrentPage()-1) ;
            $prev_link = "<li>";
            $prev_link .= "<a href='$url'>Prev</a>";

            $prev_link .= "</li>";
            $prev_page= $prev_link;
        }
        return $prev_page;
    }
    public function getNextpage() {
        $next_page = '';
        $current_page = $this->getCurrentPage();
        $total_page = $this->getTotalPage();
        if ($total_page ==1) {
            return '';
        }
        if ($current_page<$total_page) {
            $url = "index.php?controler=".$this->params['controller']."&action=".$this->params['action']."&page=".($current_page+1) ;
            $next_link = "<li>";
            $next_link .= "<a href='$url'>Next</a>";

            $next_link .= "</li>";
            $next_page=$next_link;
        }
        return $next_page;
    }
    public function getPagination() {
        $data = "";
        $total_page = $this->getTotalPage();
        $data = "<ul class='pagination'>";
        $data .= $this->getPrevPage();
        for ($page=1;$page<=$total_page;$page++) {
            $current_page = $this->getCurrentPage();
            if ($current_page == $page) {
                $data .= "<li class='active'>";
                $data .= "<a href='#'>Trang $page</a>";

                $data .= "</li>";
//                $data=$next_link;
//                $data .= "<a href='#'>Trang $page</a>";
            }
            else {
                $url = "index.php?controler=".$this->params['controller']."&action=".$this->params['action']."&page=".($page) ;
                $data .= "<li>";
                $data .= "<a href='$url'>Trang $page</a>";
                $data .= "</li>";
            }
        }
        $data .= $this->getNextpage();
        $data .= "</li></ul>";
        return $data;
    }
}

?>
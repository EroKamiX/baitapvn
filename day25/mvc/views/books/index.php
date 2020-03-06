<?php
require_once 'views/layouts/header.php';
?>
<a href="index.php?action=create">Thêm Sách mới</a>
<table cellpadding="8" cellspacing="0">
    <tr>
        <th>ID</th>
        <th>TEN SACH</th>
        <th>SO LUONG</th>
        <th>AVATAR</th>
        <th>ngày tạo</th>
        <th>hành động</th>
    </tr>
    <?php if(empty($books)): ?>
        <tr>
            <td colspan="6">KHONG CO BAN GHI</td>
        </tr>
    <?php else:?>
    <?php foreach ($books AS $book) :?>
            <tr>
                <td><?php echo $book['id']?></td>
                <td><?php echo $book['name']?></td>
                <td><?php echo $book['amount']?></td>
                <td>
                    <?php if (!empty( $book['avatar'])) :?>
                    <img src="assets/uploads/<?php echo $book['avatar']?>" height="60px"/>
                <?php endif;?>
                </td>
                <td><?php
                    $created_at = date("d-m-Y H:i:s", strtotime($book['created_at']));
                    echo $created_at;
                    ?></td>
                <td>
                    <?php $url_update = "index.php?action=update&id=".$book['id']?>
                    <?php $url_delete = "index.php?action=delete&id=".$book['id']?>
                    <a href="<?php echo $url_update?>">Sửa</a>
                    <a href="<?php echo $url_delete?>" onclick="return confirm('Ban có muốn xóa không')">Xóa</a>
                </td>
            </tr>
        <?php endforeach;?>
    <?php endif;?>

<?php
require_once 'views/layouts/footer.php';
?>

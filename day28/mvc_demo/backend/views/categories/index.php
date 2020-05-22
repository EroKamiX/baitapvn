<!--views/categories/index.php-->
<a href="index.php?controller=category&action=create" class="btn btn-primary">
    <i class="fa fa-plus"></i> Thêm mới
</a>
<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <th>NAME</th>
        <th>Avatar</th>
        <th>Description</th>
        <th>ACTION</th>
    </tr>
    <?php foreach ($categories AS $category) :?>
        <tr>
            <td><?php echo $category['id']?></td>
            <td><?php echo $category['name']?></td>
            <td>
                <img width="50px" src="assets/uploads/<?php echo $category['avatar']?>" alt="">
            </td>
            <td><?php echo $category['description']?></td>
            <td>
                <?php
                $link_update = "index.php?action=update&id=".$category['id'];
                ?>
                <a href="<?php echo $link_update?>"><i class="fa fa-pencil-alt"></i></a>
                <?php $link_delete = "index.php?action=delete&id=".$category['id'];
                ?>
                <a href="<?php echo $link_update?>"><i class="fa fa-trash"></i></a>

            </td>
        </tr>
    <?php endforeach; ?>

</table>
<?php echo $pagination?>
<?php
/**
 * Created by PhpStorm.
 * User: tu901
 * Date: 2/29/2020
 * Time: 3:36 PM
 */
?>
    <!-- Begin Page Content -->
<div class="container-fluid">

    <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Categories</h6>
        <div style="text-align: right"><button  class="btn btn-success"><a style="color: white" href="index.php?action=create">Thêm Mới</a></button></div>
    </div>
    <div class="card-body">
    <div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>USER</th>
                <th>TITLE</th>
                <th>PICTURE DESCRIPTION</th>
                <th>DESCRIPTION</th>
                <th>CREATED_AT</th>
                <th>UPDATE_AT</th>
                <th>ACTION</th>
            </tr>
        </thead>
        <tbody>
        <?php if (empty($categories)) :?>
            <tr>
                <td colspan="7">Không có bản ghi nào</td>
            </tr>
        <?php else:?>
            <?php foreach ($categories AS $category) :?>
                <tr>
                    <td><?php echo $category['id']?></td>
                    <td><?php echo $category['user']?></td>
                    <td><?php echo $category['title']?></td>
                    <td><img src="assets/upload/<?php echo $category['pic_des']?>" alt="" width="60"></td>
                    <td><?php echo $category['description']?></td>
                    <td><?php
                        echo date("d-m-Y H:i:s",strtotime($category['created_at']));
                        ?></td>
                    <td><?php if (isset ($category['update_at'])) {
                            echo date("d-m-Y H:i:s",strtotime($category['update_at']));
                        } ?></td>
                    <td>
                        <a  href="index.php?id=<?php echo $category['id']?>&action=detail"><i class="fa fa-eye" aria-hidden="true"></i></a>
                        <a  href="index.php?id=<?php echo $category['id']?>&action=update"><i class="fa fa-retweet" aria-hidden="true"></i></a>
                        <a  href="index.php?id=<?php echo $category['id']?>&action=delete" onclick="return confirm('Bạn có chắc chắn muốn xóa bản ghi này')"><i class="fa fa-trash" aria-hidden="true"></i></a>

                    </td>


                </tr>


            <?php endforeach;?>
            <?php endif;?>
    </tbody>
    </table>
    </div>
    </div>
    </div>

</div>

    <!-- /.container-fluid -->

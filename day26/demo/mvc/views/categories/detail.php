
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
            <h6 class="m-0 font-weight-bold text-primary">Category</h6>
            <div style="text-align: right">
                <button  class="btn btn-success"><a style="color: white" href="index.php?id=<?php echo $category['id']?>&action=update">Sửa</a></button>
                <button  class="btn btn-danger"><a style="color: white" href="index.php?id=<?php echo $category['id']?>&action=delete"
                                                   onclick="return confirm('Bạn có chắc là bạn muốn xóa không')">Xóa</a></button>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <tr>
                        <th>ID</th>
                        <td><?php echo $category['id']; ?></td>
                    </tr>
                    <tr>
                        <th>Names</th>
                        <td><?php echo $category['names']; ?></td>
                    </tr>
                    <tr>
                        <th>Avatar</th>
                        <td>
                            <?php if (!empty($category['pic_des'])): ?>
                                <img src="assets/upload/<?php echo $category['pic_des'] ?>" width="60"/>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Description</th>
                        <td><?php echo $category['description']; ?></td>
                    </tr>
                    <tr>
                        <th>Created_at</th>
                        <td>
                            <?php echo date('d-m-Y H:i:s', strtotime($category['created_at'])); ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Updated_at</th>
                        <td>
                            <?php if (isset ($category['update_at'])) {
                                echo date("d-m-Y H:i:s",strtotime($category['update_at']));
                            }
                            else {
                                echo "<span style='color:limegreen;'>Chưa Update lần nào</span>";
                            } ?>
                        </td>
                    </tr>
                </table>
                <button class="btn btn-primary"><a style="color: white" href="index.php">Back</a></button>
            </div>
        </div>
    </div>

<!-- /.container-fluid -->



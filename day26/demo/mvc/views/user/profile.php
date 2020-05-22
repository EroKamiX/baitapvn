
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
                <button  class="btn btn-success"><a style="color: white" href="index.php?id=<?php echo $user['id']?>&action=update">Sửa</a></button>
                <button  class="btn btn-danger"><a style="color: white" href="index.php?id=<?php echo $user['id']?>&action=delete"
                                                   onclick="return confirm('Bạn có chắc là bạn muốn xóa không')">Xóa</a></button>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <tr>
                        <th>ID</th>
                        <td><?php echo $user['id']; ?></td>
                    </tr>
                    <tr>
                        <th>Avatar</th>
                        <td>
                            <?php if (!empty($user['avatar'])): ?>
                                <img src="assets/upload/<?php echo $user['avatar'] ?>" width="60"/>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Names</th>
                        <td><?php echo $user['username']; ?></td>
                    </tr>
                    <tr>
                        <th>Phone Number</th>
                        <td><?php echo $user['phone']; ?></td>
                    </tr>
                    <tr>
                        <th>Address</th>
                        <td><?php echo $user['Address']; ?></td>
                    </tr>
                    <tr>
                        <th>Created_at</th>
                        <td>
                            <?php echo date('d-m-Y H:i:s', strtotime($user['created_at'])); ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Updated_at</th>
                        <td>
                            <?php if (isset ($user['update_at'])) {
                                echo date("d-m-Y H:i:s",strtotime($user['update_at']));
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


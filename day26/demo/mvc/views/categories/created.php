

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <h2>Thêm mới danh mục</h2>
            <form method="post" action="" enctype="multipart/form-data">
                <div class="form-group">
                    <label>User</label>
                    <input type="text" name="user" value="<?php echo isset($_POST['user']) ? $_POST['user'] : ''; ?>"
                           class="form-control"/>
                </div>
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="title" value="<?php echo isset($_POST['title']) ? $_POST['title'] : ''; ?>"
                           class="form-control"/>
                </div>

                <div class="form-group">
                    <label>Ảnh đại diện</label>
                    <input type="file" name="pic_des" class="form-control"/>
                </div>

                <div class="form-group">
                    <label>Mô tả</label>
                    <textarea class="form-control"
                              name="description"><?php echo isset($_POST['description']) ? $_POST['description'] : ''; ?></textarea>
                </div>

                <input type="submit" class="btn btn-primary" name="submit" value="Save"/>
                <input type="reset" class="btn btn-secondary" name="submit" value="Reset"/>
            </form>

        </div>
        <!-- /.container-fluid -->


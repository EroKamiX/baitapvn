

<!-- Begin Page Content -->
<div class="container-fluid">

    <?php if (empty($category)): ?>
        <h2>Không tồn tại category</h2>
    <?php else: ?>
        <h2>Chỉnh sửa danh mục #<?php echo $category['id'] ?></h2>
        <form method="post" action="" enctype="multipart/form-data">
            <div class="form-group">
                <label>Names</label>
                <input type="text" name="names"
                       value="<?php echo isset($_POST['names']) ? $_POST['names'] : $category['names']; ?>"
                       class="form-control"/>
            </div>
            <div class="form-group">
                <label>Title</label>
                <input type="text" name="title" value="<?php echo isset($_POST['title']) ? $_POST['title'] : $category['title']; ?>"
                       class="form-control"/>
            </div>

            <div class="form-group">
                <label>Ảnh Miêu TẢ</label>
                <input type="file" name="pic_des" class="form-control"/>
            </div>
            <?php if (!empty($category['pic_des'])): ?>
                <img src="assets/upload/<?php echo $category['pic_des']; ?>" height="50"/>
            <?php endif; ?>

            <div class="form-group">
                <label>Mô tả</label>
                <textarea class="form-control"
                          name="description"><?php echo isset($_POST['description']) ? $_POST['description'] : $category['description']; ?></textarea>
            </div>


            <input type="submit" class="btn btn-primary" name="submit" value="Save"/>
            <input type="reset" class="btn btn-secondary" name="submit" value="Reset"/>
        </form>
    <?php endif; ?>

</div>
<!-- /.container-fluid -->


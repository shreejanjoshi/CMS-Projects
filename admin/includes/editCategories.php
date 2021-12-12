<!-- form to edit -->
<form action="" method="POST">
    <div class="form-group">
        <label for="cat-title">Edit Category</label>
        <?php
        // show edit query

        if (isset($_GET['edit'])) {

            $editCatId = $_GET['edit'];

            $query = "SELECT * FROM categories WHERE cat_id = {$editCatId} ";
            $selectAdminCategoriesEditId = mysqli_query($connection, $query);

            if (!$selectAdminCategoriesEditId) {
                die("Query Error " . mysqli_error($connection));
            }

            while ($row = mysqli_fetch_assoc($selectAdminCategoriesEditId)) {
                $catId = $row['cat_id'];
                $catTitle = $row['cat_title'];
        ?>
                <input value="<?php
                                // echo $catTitle;
                                if (isset($catTitle)) {
                                    echo $catTitle;
                                }
                                ?>" type="text" class="form-control" name="cat_title">
        <?php }
        }
        ?>

        <?php

        // update query
        if (isset($_POST['update'])) {
            $updateCatTitle = $_POST['cat_title'];

            $query = "UPDATE categories SET cat_title = '{$updateCatTitle}' WHERE cat_id = {$editCatId} ";

            $updateQuery = mysqli_query($connection, $query);

            // if (!$updateQuery) {
            //     die("Query Error " . mysqli_error($connection));
            // }
        }
        ?>




    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="update" value="Update">
    </div>
</form>
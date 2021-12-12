<?php include "includes/adminHeader.php"; ?>

<div id="wrapper">

    <!-- Navigation -->
    <?php include "includes/adminNavigation.php"; ?>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Welcome Back to Admin
                        <small>Author</small>
                    </h1>

                    <!-- change data -->
                    <div class="col-xs-6">

                        <?php
                        // query to add cat
                        if (isset($_POST['submit'])) {
                            $catTitle = $_POST['cat_title'];

                            if ($catTitle == "" || empty($catTitle)) {
                                echo "This field should not be empty";
                            } else {
                                $query = "INSERT INTO categories(cat_title) ";
                                $query .= "VALUE ('{$catTitle}') ";

                                $createCategoryQuery = mysqli_query($connection, $query);

                                if (!$createCategoryQuery) {
                                    die("Query Failed " . mysqli_error($connection));
                                }
                            }
                        }
                        ?>
                        <!-- form to add cat -->
                        <form action="" method="POST">
                            <div class="form-group">
                                <label for="cat-title">Add Category</label>
                                <input type="text" class="form-control" name="cat_title">
                            </div>
                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                            </div>
                        </form>
                        <!-- form to edit -->
                        <form action="" method="POST">
                            <div class="form-group">
                                <label for="cat-title">Edit Category</label>
                                <?php
                                // edit query

                                if (isset($_GET['edit'])) {

                                    $editCatId = $_GET['edit'];

                                    $query = "SELECT * FROM categories WHERE cat_id = $editCatId ";
                                    $selectAdminCategoriesEditId = mysqli_query($connection, $query);

                                    if (!$selectAdminCategoriesEditId) {
                                        die("Query Error " . mysqli_error($connection));
                                    }

                                    while ($row = mysqli_fetch_assoc($selectAdminCategoriesEditId)) {
                                        // $catId = $row['cat_id'];
                                        $catTitle = $row['cat_title'];
                                ?>
                                        <input value="
                                        <?php
                                        echo $catTitle;
                                        // if(isset($catTitle)){
                                        //     echo $catTitle;
                                        // }
                                        ?>" type="text" class="form-control" name="cat_title">
                                <?php }
                                }
                                ?>




                            </div>
                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" name="submit" value="Update">
                            </div>
                        </form>
                    </div>

                    <div class="col-xs-6">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Category Title</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                //find all cat query to show cat
                                $query = "SELECT * FROM categories";
                                $selectAdminCategories = mysqli_query($connection, $query);

                                if (!$selectAdminCategories) {
                                    die("Query Error " . mysqli_error($connection));
                                }

                                while ($row = mysqli_fetch_assoc($selectAdminCategories)) {
                                    $catId = $row['cat_id'];
                                    $catTitle = $row['cat_title'];
                                    echo "<tr>";
                                    echo "<td>{$catId}</td>";
                                    echo "<td>{$catTitle}</td>";
                                    echo "<td><a href='categories.php?delete={$catId}'>Delete</a></td>";
                                    echo "<td><a href='categories.php?edit={$catId}'>Edit</a></td>";
                                    echo "</tr>";
                                }
                                ?>

                                <?php
                                // query to delete php
                                if (isset($_GET['delete'])) {
                                    $deleteCatId = $_GET['delete'];

                                    $query = "DELETE FROM categories WHERE cat_id = {$deleteCatId} ";

                                    $deleteQuery = mysqli_query($connection, $query);

                                    header("Location: categories.php");
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>



    <!-- /#page-wrapper -->

    <?php include "includes/adminFooter.php"; ?>
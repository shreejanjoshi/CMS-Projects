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
                        <form action="">
                            <div class="form-group">
                                <label for="cat-title">Add Category</label>
                                <input type="text" class="form-control" name="cat_title">
                            </div>
                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                            </div>
                        </form>
                    </div>

                    <div class="col-xs-6">

                        <?php
                        $query = "SELECT * FROM categories";
                        $selectAdminCategories = mysqli_query($connection, $query);

                        if (!$selectAdminCategories) {
                            die("Query Error " . mysqli_error($connection));
                        }
                        ?>
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Category Title</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($row = mysqli_fetch_assoc($selectAdminCategories)) {
                                    $catId = $row['cat_id'];
                                    $catTitle = $row['cat_title'];
                                    echo "<tr>";
                                    echo "<td>{$catId}</td>";
                                    echo "<td>{$catTitle}</td>";
                                    echo "</tr>";
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
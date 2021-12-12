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

                        insert_cat();

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

                        <?php
                        //update and include query
                        if (isset($_GET['edit'])) {
                            $editCatId = $_GET['edit'];

                            include "includes/editCategories.php";

                            // require_once "includes" . DIRECTORY_SEPARATOR . "editCategories.php";
                        }
                        ?>
                    </div>

                    <!-- add cat form -->
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

                                findAllCat();

                                ?>

                                <?php
                                // query to delete php
                                deleteCat();

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
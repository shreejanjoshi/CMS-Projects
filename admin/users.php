<?php include "includes/adminHeader.php"; ?>

<div id="wrapper">

    <!-- Navigation -->
    <?php include "includes/adminNavigation.php"; ?>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">

                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome Back to Admin
                            <small>Author</small>
                        </h1>

                        <?php
                        if (isset($_GET['source'])) {
                            $source = $_GET['source'];
                        } else {
                            $source = '';
                        }

                        switch ($source) {
                            case 'addUser';
                                include "includes/addUser.php";
                                break;
                            case 'editUser';
                                include "includes/editUser.php";
                                break;

                            default:
                                include "includes/viewAllUsers.php";
                                break;
                        }


                        ?>

                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>



        <!-- /#page-wrapper -->

        <?php include "includes/adminFooter.php"; ?>
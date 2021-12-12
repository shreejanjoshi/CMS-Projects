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

                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Author</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Images</th>
                                    <th>Status</th>
                                    <th>Tags</th>
                                    <th>Comments</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>


                                <?php

                                $query = "SELECT * FROM posts";
                                $selectAdminPosts = mysqli_query($connection, $query);

                                if (!$selectAdminPosts) {
                                    die("Query Error " . mysqli_error($connection));
                                }

                                while ($row = mysqli_fetch_assoc($selectAdminPosts)) {
                                    $postId = $row['posts_id'];
                                    $postAuthor = $row['post_author'];
                                    $postTitle = $row['post_title'];
                                    $postCategoryId = $row['post_category_id'];
                                    $postImages = $row['post_image'];
                                    $postStatus = $row['post_content'];
                                    $postTags = $row['post_tags'];
                                    $postCommentsCount = $row['post_comment_count'];
                                    $postDate = $row['post_date'];

                                    echo "<tr>";
                                    echo "<td>{$postId}</td>";
                                    echo "<td>{$postAuthor}</td>";
                                    echo "<td>{$postTitle}</td>";
                                    echo "<td>{$postCategoryId}</td>";
                                    echo "<td><img width='100' src='../img/{$postImages}' alt='image'></td>";
                                    echo "<td>{$postStatus}</td>";
                                    echo "<td>{$postTags}</td>";
                                    echo "<td>{$postCommentsCount}</td>";
                                    echo "<td>{$postDate}</td>";
                                    echo "</tr>";
                                }

                                ?>
                            </tbody>
                        </table>

                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>



        <!-- /#page-wrapper -->

        <?php include "includes/adminFooter.php"; ?>
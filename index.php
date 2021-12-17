<!-- database -->
<?php include "includes/database.php"; ?>

<!-- header -->
<?php include "includes/header.php"; ?>

<!-- Navigation -->
<?php include "includes/navigation.php"; ?>

<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

        <?php
            $query = "SELECT * FROM posts";
            $selectAllPostsQuery = mysqli_query($connection, $query);

            if (!$selectAllPostsQuery) {
                die("Posts Query Error " . mysqli_error($connection));
            }

            while ($row = mysqli_fetch_assoc($selectAllPostsQuery)) {
                $postId = $row['posts_id'];
                $postTitle = $row['post_title'];
                $postAuthor = $row['post_author'];
                $postDate = $row['post_date'];
                $postImage = $row['post_image'];
                $postContent = substr($row['post_content'],0,100);

        ?>

                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->
                <h2>
                    <a href="post.php?pId=<?php echo $postId; ?>"><?php echo $postTitle; ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php  echo $postAuthor; ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo"$postDate"; ?></p>
                <hr>
                <img class="img-responsive" src="img/<?php echo $postImage; ?>" alt="">
                <hr>
                <p><?php echo $postContent . "...."; ?></p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>

        <?php } ?>

        </div>

        <!-- Blog Sidebar Widgets Column -->


        <?php include "includes/sidebar.php"; ?>

    </div>
    <!-- /.row -->

    <hr>

    <?php include "includes/footer.php"; ?>
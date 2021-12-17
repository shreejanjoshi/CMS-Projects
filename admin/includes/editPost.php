<?php

    if(isset($_GET['pId'])){
        $editPostId =  $_GET['pId'];
    }

    $query = "SELECT * FROM posts WHERE posts_id = $editPostId ";
    $selectAdminPostsId = mysqli_query($connection, $query);

    if (!$selectAdminPostsId) {
        die("Query Error " . mysqli_error($connection));
    }

    while ($row = mysqli_fetch_assoc($selectAdminPostsId)) {
        $postId = $row['posts_id'];
        $postAuthor = $row['post_author'];
        $postTitle = $row['post_title'];
        $postCategoryId = $row['post_category_id'];
        $postImages = $row['post_image'];
        $postStatus = $row['post_status'];
        $postTags = $row['post_tags'];
        $postCommentsCount = $row['post_comment_count'];
        $postDate = $row['post_date'];
        $postContent = $row['post_content'];
    }

    if(isset($_POST['updatePost'])){

        $postTitle =  mysqli_real_escape_string($connection, $_POST['title']);
        $author =  mysqli_real_escape_string($connection, $_POST['author']);
        $postCategoryId =  mysqli_real_escape_string($connection, $_POST['postCategory']);
        $postStatus =  mysqli_real_escape_string($connection, $_POST['postStatus']);

        $postImage =  $_FILES['image']['name'];
        $postImageTemp = $_FILES['image']['tmp_name'];

        $postTags =  mysqli_real_escape_string($connection, $_POST['postTags']);  
        $postContent =  mysqli_real_escape_string($connection, $_POST['postContent']);

        move_uploaded_file($postImageTemp, "../img/$postImage");

        if(empty($postImage)){
            $query = "SELECT * FROM posts WHERE posts_id = $editPostId";

            $selectImg = mysqli_query($connection, $query);

            while($row = mysqli_fetch_assoc($selectImg)){
                $postImage = $row['post_image'];
            }
        }

        $query = "UPDATE posts SET ";
        $query .="post_title  = '{$postTitle}', ";
        $query .="post_category_id = '{$postCategoryId}', ";
        $query .="post_date   =  now(), ";
        $query .="post_author = '{$author}', ";
        $query .="post_status = '{$postStatus}', ";
        $query .="post_tags   = '{$postTags}', ";
        $query .="post_content= '{$postContent}', ";
        $query .="post_image  = '{$postImage}' ";
        $query .= "WHERE posts_id = {$postId} ";        

        $updatePost = mysqli_query($connection, $query);

        confirm($updatePost);
    }
?>
<form action="" method="post" enctype="multipart/form-data">
    <!-- for pic to upload sending different -->

<div class="form-group">
    <label for="title">Post Title</label>
    <input  value="<?php echo $postTitle; ?>" type="text" class="form-control" name="title">
</div>

<div class="form-group">
    <label for="postCategory">Post Category</label><br>
    <select name="postCategory" id="">
    <?php
        $query = "SELECT * FROM categories";
        $selectAdminCategories = mysqli_query($connection, $query);

        confirm($selectAdminCategories);

        while ($row = mysqli_fetch_assoc($selectAdminCategories)) {
            $catId = $row['cat_id'];
            $catTitle = $row['cat_title'];

            echo "<option value='{$catId}'>{$catTitle}</option>";
        }
    ?>
    </select>
</div>

<div class="form-group">
    <label for="title">Post Author</label>
    <input  value="<?php echo $postAuthor; ?>" value="<?php echo $postAuthor; ?>" type="text" class="form-control" name="author">
</div>

<div class="form-group">
    <label for="postStatus">Post Status</label>
    <input  value="<?php echo $postStatus; ?>" type="text" class="form-control" name="postStatus">
</div>

<div class="form-group">
    <label for="postImage">Post Image</label>
    <br>
    <img width="100" src="../img/<?php echo $postImages; ?>" alt="">
    <br>
    <input  value="<?php echo $postImages; ?>" type="file" name="image">
</div>

<div class="form-group">
    <label for="postTags">Post Tags</label>
    <input  value="<?php echo $postTags; ?>" type="text" class="form-control" name="postTags">
</div>

<div class="form-group">
    <label for="postContent">Post Content</label>
    <textarea class="form-control" name="postContent" id="" cols="30" rows="10"><?php echo $postContent; ?></textarea>
</div>

<div>
    <input class="btn btn-primary" type="submit" name="updatePost" value="Publish Post">
</div>
</form>
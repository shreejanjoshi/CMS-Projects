<?php 
    if(isset($_POST['createPost'])){
        $postTitle =  mysqli_real_escape_string($connection, $_POST['title']);
        $author =  mysqli_real_escape_string($connection, $_POST['author']);
        $postCategoryId =  mysqli_real_escape_string($connection, $_POST['postCategory']);
        $postStatus =  mysqli_real_escape_string($connection, $_POST['postStatus']);

        $postImage =  $_FILES['image']['name'];
        $postImageTemp = $_FILES['image']['tmp_name'];

        $postTags =  mysqli_real_escape_string($connection, $_POST['postTags']);  
        $postContent =  mysqli_real_escape_string($connection, $_POST['postContent']);  
        $postDate = date('d-m-y');
        // $postCommentCount = 4;

        move_uploaded_file($postImageTemp, "../img/$postImage");


        $query = "INSERT INTO posts(post_category_id, post_title, post_author, post_date, post_image, post_content, post_tags,post_status) ";
        $query .= "VALUES('{$postCategoryId}', '{$postTitle}', '{$author}' , now(), '{$postImage}', '{$postContent}', '{$postTags}', '{$postStatus}' ) "; 

        $createPostQuery = mysqli_query($connection, $query);
        
        confirm($createPostQuery);
    }
?>


<form action="" method="post" enctype="multipart/form-data">
    <!-- for pic to upload sending different -->

<div class="form-group">
    <label for="title">Post Title</label>
    <input type="text" class="form-control" name="title">
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
    <input type="text" class="form-control" name="author">
</div>

<div class="form-group">
    <label for="postStatus">Post Status</label>
    <input type="text" class="form-control" name="postStatus">
</div>

<div class="form-group">
    <label for="postImage">Post Image</label>
    <input type="file" name="image">
</div>

<div class="form-group">
    <label for="postTags">Post Tags</label>
    <input type="text" class="form-control" name="postTags">
</div>

<div class="form-group">
    <label for="postContent">Post Content</label>
    <textarea class="form-control" name="postContent" id="" cols="30" rows="10"></textarea>
</div>

<div>
    <input class="btn btn-primary" type="submit" name="createPost" value="Publish Post">
</div>
</form>


<?php
   

<?php
if (isset($_POST['createPost'])) {
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
        <label for="Firstname">Firstname</label>
        <input type="text" class="form-control" name="userFirstname">
    </div>

    <div class="form-group">
        <label for="Lastname">Lastname</label>
        <input type="text" class="form-control" name="userLastname">
    </div>

    <div class="form-group">
        <label for="role">Role</label><br>
        <select name="userRole" id="">
            <?php
            $query = "SELECT * FROM users";
            $selectUserRole = mysqli_query($connection, $query);

            confirm($selectUserRole);

            while ($row = mysqli_fetch_assoc($selectUserRole)) {
                $userId = $row['user_id'];
                $userRole = $row['user_role'];

                echo "<option value='{$userId}'>{$userRole}</option>";
            }
            ?>
        </select>
    </div>

    <!-- <div class="form-group">
        <label for="postImage">Post Image</label>
        <input type="file" name="image">
    </div> -->

    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" name="username">
    </div>

    <div class="form-group">
        <label for="Email">Email</label>
        <input type="text" class="form-control" name="userEmail">
    </div>

    <div class="form-group">
        <label for="Password">Password</label>
        <input type="password" class="form-control" name="userPassword">
    </div>

    <div>
        <input class="btn btn-primary" type="submit" name="createUser" value="Add User">
    </div>
</form>


<?php

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
            $postStatus = $row['post_status'];
            $postTags = $row['post_tags'];
            $postCommentsCount = $row['post_comment_count'];
            $postDate = $row['post_date'];
            $postContent = $row['post_content'];

            echo "<tr>";
            echo "<td>{$postId}</td>";
            echo "<td>{$postAuthor}</td>";
            echo "<td>{$postTitle}</td>";

            $query = "SELECT * FROM categories WHERE cat_id = {$postCategoryId} ";
            $selectAdminCategoriesEditId = mysqli_query($connection, $query);

            if (!$selectAdminCategoriesEditId) {
                die("Query Error " . mysqli_error($connection));
            }

            while ($row = mysqli_fetch_assoc($selectAdminCategoriesEditId)) {
                $catId = $row['cat_id'];
                $catTitle = $row['cat_title'];

                echo "<td>{$catTitle}</td>";
            }

            echo "<td><img width='100' src='../img/{$postImages}' alt='image'></td>";
            echo "<td>{$postStatus}</td>";
            echo "<td>{$postTags}</td>";
            echo "<td>{$postCommentsCount}</td>";
            echo "<td>{$postDate}</td>";
            echo "<td><a href='posts.php?source=editPost&pId={$postId}'>Edit</a></td>";
            echo "<td><a href='posts.php?delete={$postId}'>Delete</a></td>";
            echo "</tr>";
        }

        ?>
    </tbody>
</table>

<?php
if (isset($_GET['delete'])) {
    $deletePostId = $_GET['delete'];

    $query = "DELETE FROM posts WHERE posts_id = {$deletePostId} ";
    $deleteQuery = mysqli_query($connection, $query);
}
?>
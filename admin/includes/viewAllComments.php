<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Author</th>
            <th>Comment</th>
            <th>Email</th>
            <th>Status</th>
            <th>In Response to</th>
            <th>Date</th>
            <th>Approve</th>
            <th>Unapprove</th>
        </tr>
    </thead>
    <tbody>


        <?php

        $query = "SELECT * FROM comments";
        $selectComments = mysqli_query($connection, $query);

        if (!$selectComments) {
            die("Query Error " . mysqli_error($connection));
        }

        while ($row = mysqli_fetch_assoc($selectComments)) {
            $commentId = $row['comment_id'];
            $commentPostId = $row['comment_post_id'];
            $commentAuthor = $row['comment_author'];
            $commentContent = $row['comment_content'];
            $commentEmail = $row['comment_email'];
            $commentStatus = $row['comment_status'];
            $commentDate = $row['comment_date'];

            echo "<tr>";
            echo "<td>{$commentId}</td>";
            echo "<td>{$commentAuthor}</td>";
            echo "<td>{$commentContent}</td>";
            echo "<td>{$commentEmail}</td>";

            // $query = "SELECT * FROM categories WHERE cat_id = {$postCategoryId} ";
            // $selectAdminCategoriesEditId = mysqli_query($connection, $query);

            // if (!$selectAdminCategoriesEditId) {
            //     die("Query Error " . mysqli_error($connection));
            // }

            // while ($row = mysqli_fetch_assoc($selectAdminCategoriesEditId)) {
            //     $catId = $row['cat_id'];
            //     $catTitle = $row['cat_title'];

            //     echo "<td>{$catTitle}</td>";
            // }

            echo "<td>{$commentStatus}</td>";


            $query = "SELECT * FROM posts WHERE posts_id = $commentPostId";
            $selectPostIdQuery = mysqli_query($connection, $query);

            while ($row = mysqli_fetch_assoc($selectPostIdQuery)) {
                $postId = $row['posts_id'];
                $postTitle = $row['post_title'];

                echo "<td>$postTitle </td>";
            }




            echo "<td>{$commentDate}</td>";
            echo "<td><a href='posts.php?source=editPost&pId={$commentId}'>Approve</a></td>";
            echo "<td><a href='posts.php?delete={$commentId}'>Unapprove</a></td>";
            echo "<td><a href='posts.php?delete={$commentId}'>Delete</a></td>";
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
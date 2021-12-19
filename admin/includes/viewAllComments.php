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
            <th>Delete</th>
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

                echo "<td><a href='../post.php?pId=$postId'>$postTitle</a></td>";
            }




            echo "<td>{$commentDate}</td>";
            echo "<td><a href='comments.php?approve={$commentId}'>Approve</a></td>";
            echo "<td><a href='comments.php?unapprove={$commentId}'>Unapprove</a></td>";
            echo "<td><a href='comments.php?delete={$commentId}'>Delete</a></td>";
            echo "</tr>";
        }

        ?>
    </tbody>
</table>

<?php

if (isset($_GET['unapprove'])) {
    $unapproveCommentId = $_GET['unapprove'];

    $query = "UPDATE comments SET  comment_status = 'unapproved' WHERE comment_id = $unapproveCommentId";
    $unapproveQuery = mysqli_query($connection, $query);

    header("Location: comments.php");
}

if (isset($_GET['approve'])) {
    $approveCommentId = $_GET['approve'];

    $query = "UPDATE comments SET  comment_status = 'approved' WHERE comment_id = $approveCommentId";
    $approveQuery = mysqli_query($connection, $query);

    header("Location: comments.php");
}


if (isset($_GET['delete'])) {
    $deleteCommentId = $_GET['delete'];

    $query = "DELETE FROM comments WHERE comment_id = {$deleteCommentId} ";
    $deleteQuery = mysqli_query($connection, $query);

    header("Location: comments.php");
}
?>
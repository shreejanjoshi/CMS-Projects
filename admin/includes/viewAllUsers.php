<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>username</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Email</th>
            <th>Role</th>
        </tr>
    </thead>
    <tbody>



        <?php

        $query = "SELECT * FROM users";
        $selectUsers = mysqli_query($connection, $query);

        if (!$selectUsers) {
            die("Query Error " . mysqli_error($connection));
        }

        while ($row = mysqli_fetch_assoc($selectUsers)) {
            $userId = $row['user_id'];
            $username = $row['username'];
            $userPassword = $row['user_password'];
            $userFirstname = $row['user_firstname'];
            $userLastname = $row['user_lastname'];
            $userEmail = $row['user_email'];
            $userImage = $row['user_image'];
            $userRole = $row['user_role'];

            echo "<tr>";
            echo "<td>{$userId}</td>";
            echo "<td>{$username}</td>";
            echo "<td>{$userFirstname}</td>";
            echo "<td>{$userLastname}</td>";
            echo "<td>{$userEmail}</td>";
            echo "<td>{$userRole}</td>";

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

            // echo "<td>{$commentStatus}</td>";


            // $query = "SELECT * FROM posts WHERE posts_id = $commentPostId";
            // $selectPostIdQuery = mysqli_query($connection, $query);

            // while ($row = mysqli_fetch_assoc($selectPostIdQuery)) {
            //     $postId = $row['posts_id'];
            //     $postTitle = $row['post_title'];

            //     echo "<td><a href='../post.php?pId=$postId'>$postTitle</a></td>";
            // }


            echo "<td><a href='users.php?changeToAdmin={$userId}'>Admin</a></td>";
            echo "<td><a href='users.php?changeToSub={$userId}'>Subscriber</a></td>";
            echo "<td><a href='users.php?source=editUser&editUser={$userId}'>Edit</a></td>";
            echo "<td><a href='users.php?delete={$userId}'>Delete</a></td>";
            echo "</tr>";
        }

        ?>
    </tbody>
</table>

<?php

if (isset($_GET['changeToAdmin'])) {
    $changeToAdminId = $_GET['changeToAdmin'];

    $query = "UPDATE users SET  user_role = 'admin' WHERE user_id = $changeToAdminId";
    $changeToAdminQuery = mysqli_query($connection, $query);

    header("Location: users.php");
}

if (isset($_GET['changeToSub'])) {
    $changeToSubId = $_GET['changeToSub'];

    $query = "UPDATE users SET  user_role = 'subscriber' WHERE user_id = $changeToSubId";
    $changeToSubQuery = mysqli_query($connection, $query);

    header("Location: users.php");
}


if (isset($_GET['delete'])) {
    $deleteUserId = $_GET['delete'];

    $query = "DELETE FROM users WHERE user_id = {$userId} ";
    $deleteQuery = mysqli_query($connection, $query);

    header("Location: users.php");
}
?>
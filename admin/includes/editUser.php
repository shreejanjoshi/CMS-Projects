<?php

if(isset($_GET['editUser'])){
    $userId = $_GET['editUser'];

    $query = "SELECT * FROM users WHERE user_id = $userId";
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
        }
}

if (isset($_POST['editUser'])) {
    $userFirstname =  mysqli_real_escape_string($connection, $_POST['userFirstname']);
    $userLastname =  mysqli_real_escape_string($connection, $_POST['userLastname']);
    $userRole =  mysqli_real_escape_string($connection, $_POST['userRole']);

    // $postImage =  $_FILES['image']['name'];
    // $postImageTemp = $_FILES['image']['tmp_name'];

    $username =  mysqli_real_escape_string($connection, $_POST['username']);
    $userEmail =  mysqli_real_escape_string($connection, $_POST['userEmail']);
    $userPassword =  mysqli_real_escape_string($connection, $_POST['userPassword']);
    // $postDate = date('d-m-y');

    // move_uploaded_file($postImageTemp, "../img/$postImage");


    $query = "INSERT INTO users(user_firstname, user_lastname, user_role, username, user_email, user_password) ";
    $query .= "VALUES('{$userFirstname}', '{$userLastname}', '{$userRole}', '{$username}', '{$userEmail}', '{$userPassword}') ";

    $createUserQuery = mysqli_query($connection, $query);

    confirm($createUserQuery);
}
?>


<form action="" method="post" enctype="multipart/form-data">
    <!-- for pic to upload sending different -->

    <div class="form-group">
        <label for="Firstname">Firstname</label>
        <input type="text" class="form-control" name="userFirstname" value="<?php echo $userFirstname; ?>">
    </div>

    <div class="form-group">
        <label for="Lastname">Lastname</label>
        <input type="text" class="form-control" name="userLastname" value="<?php echo $userLastname; ?>">
    </div>

    <div class="form-group">
        <label for="role">Role</label><br>
        <select name="userRole" id="">
        <option value="subscriber"><?php echo $userRole; ?></option>
        <?php
            if($userRole == 'admin'){
            echo "<option value='subscriber'>subscriber</option>";
            }else{
                echo "<option value='admin'>admin</option>";
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
        <input type="text" class="form-control" name="username" value="<?php echo $username; ?>">
    </div>

    <div class="form-group">
        <label for="Email">Email</label>
        <input type="text" class="form-control" name="userEmail" value="<?php echo $userEmail; ?>">
    </div>

    <div class="form-group">
        <label for="Password">Password</label>
        <input type="password" class="form-control" name="userPassword" value="<?php echo $userPassword; ?>">
    </div>

    <div>
        <input class="btn btn-primary" type="submit" name="editUser" value="Update User">
    </div>
</form>


<?php

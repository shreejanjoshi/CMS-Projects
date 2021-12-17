<?php

function confirm($result){
    global $connection;
    if(!$result){
        die("Query Error " . mysqli_error($connection));
    }
}

function insert_cat(){
    global $connection;
     // query to add cat
     if (isset($_POST['submit'])) {
        $catTitle = $_POST['cat_title'];

        if ($catTitle == "" || empty($catTitle)) {
            echo "This field should not be empty";
        } else {
            $query = "INSERT INTO categories(cat_title) ";
            $query .= "VALUE ('{$catTitle}') ";

            $createCategoryQuery = mysqli_query($connection, $query);

            if (!$createCategoryQuery) {
                die("Query Failed " . mysqli_error($connection));
            }
        }
    }
}

function findAllCat(){
    global $connection;

    //find all cat query to show cat
    $query = "SELECT * FROM categories";
    $selectAdminCategories = mysqli_query($connection, $query);

    if (!$selectAdminCategories) {
        die("Query Error " . mysqli_error($connection));
    }

    while ($row = mysqli_fetch_assoc($selectAdminCategories)) {
        $catId = $row['cat_id'];
        $catTitle = $row['cat_title'];
        echo "<tr>";
        echo "<td>{$catId}</td>";
        echo "<td>{$catTitle}</td>";
        echo "<td><a href='categories.php?delete={$catId}'>Delete</a></td>";
        echo "<td><a href='categories.php?edit={$catId}'>Edit</a></td>";
        echo "</tr>";
    }

}

function deleteCat(){
    global $connection;
    // query to delete php
    if (isset($_GET['delete'])) {
        $deleteCatId = $_GET['delete'];

        $query = "DELETE FROM categories WHERE cat_id = {$deleteCatId} ";

        $deleteQuery = mysqli_query($connection, $query);

        header("Location: categories.php");
    }
}


?>
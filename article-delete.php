<?php

include "db.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM articles WHERE id = '$id'";
    $result = mysqli_query($conn, $query);
    if ($result) {
        header("Location: index.php");
    } else {
        echo mysqli_connect_error();
    }
} else {
    header("Location: index.php");
}

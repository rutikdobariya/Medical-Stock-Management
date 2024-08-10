<?php

    include 'connection.php';

    $id = $_GET['ids'];

    $query = "DELETE FROM medicine WHERE id=$id";
    $status = mysqli_query($conn, $query);

    if($status)
    {
        header("Location:inventory_view.php");
        echo "<h1 class=\"text-heading\">Medicine Have Been Successfully Deleted.</h1>";
    }
    else
        echo "<h1 class=\"text-heading\">Some Problem occure to Delete Medicine.</h1>";

?>
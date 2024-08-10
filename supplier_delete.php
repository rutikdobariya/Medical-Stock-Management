<?php

    include 'connection.php';

    $id = $_GET['ids'];

    $query = "DELETE FROM supplier WHERE id=$id";
    $status = mysqli_query($conn, $query);

    if($status)
    {
        header("Location:supplier_view.php");
        echo "<h1 class=\"text-heading\">Supplier Have Been Successfully Deleted.</h1>";
    }
    else
        echo "<h1 class=\"text-heading\">Some Problem occure to Delete Supplier.</h1>";

?>
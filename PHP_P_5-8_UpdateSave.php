<?php

    $id = $_POST['id'];
    $name = $_POST['user-name'];
    $user_type = $_POST['user-type'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $password = $_POST['password'];

    include 'connection.php';

    $query = "UPDATE users SET name = '$name', user_type = '$user_type', email = '$email', mobile_number = '$phone', address = '$address', password = '$password' WHERE id = $id";

    $status = mysqli_query($conn, $query);
    // echo $status;

    if($status)
    {
        header("Location:PHP_P_5-7.php");
        echo "<h1 class=\"text-heading\">User Details Have Been Successfully Updated.</h1>";
    }
    else
        echo "<h1 class=\"text-heading\">Some Problem occure to Update Record.</h1>";

?>
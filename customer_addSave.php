<?php
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['email'])) {
  // if (isset($_REQUEST['submit'])) {
    $customer_name = $_REQUEST['customer_name'];
    $customer_contact = $_REQUEST['customer_contact'];
    $customer_email = $_REQUEST['customer_email'];
    $amount = $_REQUEST['tamount'];
    $item = $_REQUEST['count'];
    // echo $amount;
    // echo $item;
    include 'connection.php';

      $query = "INSERT INTO customer (id,customer_name,customer_contact,customer_email,item,amount) VALUES (NULL, '$customer_name', '$customer_contact', '$customer_email',$item,$amount)";

      $status = mysqli_query($conn, $query);

      if ($status) {
        header("Location:customer_view.php");
        echo "<h1 class=\"text-heading\">Customer Have Been Successfully Registered.</h1>";
      } else {
        echo "<h1>Error</h1>";
      }
} else {
  header("Location: index.php");
  exit();
}

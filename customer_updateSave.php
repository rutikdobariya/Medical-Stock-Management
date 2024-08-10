<?php
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['email'])) {
  if (isset($_REQUEST['submit'])) {
    $id = $_REQUEST['ids'];
    $customer_name = $_REQUEST['customer_name'];
    $customer_contact = $_REQUEST['customer_contact'];
    $customer_email = $_REQUEST['customer_email'];
    // $item = $_REQUEST['item'];
    // $amount = $_REQUEST['amount'];

    include 'connection.php';

    $query1 = "SELECT * FROM customer where customer_name = '$customer_name'";
    $check = mysqli_query($conn, $query1);

    $row = mysqli_num_rows($check);

    if ($row <= 0) {

      $query = "UPDATE customer SET customer_name = '$customer_name', customer_contact = '$customer_contact', customer_email = '$customer_email' WHERE id = $id";

      $status = mysqli_query($conn, $query);
      //   echo $status;

      if ($status) {
        header("Location:customer_view.php");
        echo "<h1 class=\"text-heading\">Customer Have Been Successfully Updated.</h1>";
      } else {
        echo "<h1>Error</h1>";
      }
    } else {
      $query2 = "SELECT * FROM customer where customer_name =' $customer_name' AND id = $id";
      $check1 = mysqli_query($conn, $query2);
      $row1 = mysqli_num_rows($check1);
      if ($row1 == 1) {
        $query = "UPDATE customer SET customer_name = '$customer_name', customer_contact = '$customer_contact', customer_email = '$customer_email' WHERE id = $id";

        $status = mysqli_query($conn, $query);

        if ($status) {
          header("Location:customer_view.php");
          echo "<h1 class=\"text-heading\">Customer Have Been Successfully Updated.</h1>";
        } else {
          echo "<h1>Error</h1>";
        }
      } else {
        header("Location:customer_update.php?ids=$id&error=Enter Valid Details");
      }
    }
  }
} else {
  header("Location: index.php");
  exit();
}

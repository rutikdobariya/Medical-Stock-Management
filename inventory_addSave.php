<?php
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['email'])) {
  if (isset($_REQUEST['submit'])) {
    $medicine_code = $_REQUEST['medicine_code'];
    $medicine_name = $_REQUEST['medicine_name'];
    $medicine_price = $_REQUEST['medicine_price'];
    $medicine_quantity = $_REQUEST['medicine_quantity'];
    $company_name = $_REQUEST['medicine_company'];
    $category = $_REQUEST['category'];
    
    include 'connection.php';

    $query1 = "SELECT * FROM medicine where medicine_code = $medicine_code";
    $check = mysqli_query($conn,$query1);

    $row = mysqli_num_rows($check);

    if($row <= 0){
      $query = "INSERT INTO medicine (id, medicine_code, medicine_name, medicine_price, medicine_quantity, company_name, category) VALUES (NULL, $medicine_code, '$medicine_name', $medicine_price, $medicine_quantity, '$company_name', '$category')";

      $status = mysqli_query($conn, $query);
      // echo $status;

      if ($status) {
        header("Location:inventory_view.php");
        echo "<h1 class=\"text-heading\">Medicine Have Been Successfully Registered.</h1>";
      } else {
        echo "<h1>Error</h1>";
      }
    }
    else{
      header("Location:inventory_add.php?error=Enter Valid Medicine Code");
    }

  }
} else {
  header("Location: index.php");
  exit();
}

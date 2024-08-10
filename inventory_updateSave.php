<?php
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['email'])) {
  if (isset($_REQUEST['submit'])) {
    $id = $_REQUEST['ids'];
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

      $query = "UPDATE medicine SET medicine_code = $medicine_code, medicine_name = '$medicine_name', medicine_price = $medicine_price, medicine_quantity = $medicine_quantity, company_name = '$company_name', category = '$category' WHERE id = $id";

      $status = mysqli_query($conn, $query);
    //   echo $status;

      if ($status) {
        header("Location:inventory_view.php");
        echo "<h1 class=\"text-heading\">Medicine Have Been Successfully Registered.</h1>";
      } else {
        echo "<h1>Error</h1>";
      }
    }
    else{
        $query2 = "SELECT * FROM medicine where medicine_code = $medicine_code AND id = $id";
        $check1 = mysqli_query($conn,$query2);
        $row1 = mysqli_num_rows($check1);
        if($row1 == 1)
        {
            $query = "UPDATE medicine SET medicine_code = $medicine_code, medicine_name = '$medicine_name', medicine_price = $medicine_price, medicine_quantity = $medicine_quantity, company_name = '$company_name', category = '$category' WHERE id = $id";

            $status = mysqli_query($conn, $query);

            if ($status) {
                header("Location:inventory_view.php");
                echo "<h1 class=\"text-heading\">Medicine Have Been Successfully Registered.</h1>";
            } else {
                echo "<h1>Error</h1>";
            }
        } else {
            header("Location:inventory_update.php?ids=$id&error=Enter Valid Medicine Code");
        }
    }
  }
} else {
  header("Location: index.php");
  exit();
}

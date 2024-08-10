<?php
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['email'])) {
  if (isset($_REQUEST['submit'])) {
    $id = $_REQUEST['ids'];
    $medicine_id  = $_REQUEST['medicine_id'];
    $company_name = $_REQUEST['company_name'];
    $email = $_REQUEST['email'];
    $contact_no = $_REQUEST['contact_no'];
    $alternate_contact_no = $_REQUEST['alternate_contact_no'];
    $company_address = $_REQUEST['company_address'];
    
    include 'connection.php';

    $query = "UPDATE supplier SET medicine_id = '$medicine_id', company_name = '$company_name', email = '$email', contact_no = '$contact_no', alternate_contact_no = '$alternate_contact_no', company_address = '$company_address' WHERE id = $id";

    $status = mysqli_query($conn, $query);

    if ($status) {
        header("Location:supplier_view.php");
        echo "<h1 class=\"text-heading\">Supplier Have Been Successfully Edited.</h1>";
    } else {
        echo "<h1>Error</h1>";
    }

  }
} else {
  header("Location: index.php");
  exit();
}

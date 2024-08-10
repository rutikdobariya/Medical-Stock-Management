<?php
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['email'])) {
  if (isset($_REQUEST['submit'])) {
    $medicine_id  = $_REQUEST['medicine_id'];
    $company_name = $_REQUEST['company_name'];
    $email = $_REQUEST['email'];
    $contact_no = $_REQUEST['contact_no'];
    $alternate_contact_no = $_REQUEST['alternate_contact_no'];
    $company_address = $_REQUEST['company_address'];
    
    include 'connection.php';

    $query = "INSERT INTO supplier (id, medicine_id, company_name, email, contact_no, alternate_contact_no, company_address) VALUES (NULL, $medicine_id, '$company_name', '$email', '$contact_no', '$alternate_contact_no', '$company_address')";

    $status = mysqli_query($conn, $query);

    if ($status) {
        header("Location:supplier_view.php");
        echo "<h1 class=\"text-heading\">Supplier Have Been Successfully Registered.</h1>";
    } else {
        echo "<h1>Error</h1>";
    }

  }
} else {
  header("Location: index.php");
  exit();
}

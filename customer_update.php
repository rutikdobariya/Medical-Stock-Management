<?php
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['email'])) {

  include 'connection.php';
  $id = $_GET['ids'];

  $query = "SELECT * FROM customer WHERE id=$id";
  $data = mysqli_query($conn, $query);
  $row = mysqli_fetch_array($data);
?>
  <!DOCTYPE html>
  <html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Pharmacy Management System</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

  </head>

  <body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

      <!-- Sidebar -->
      <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
          <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
          </div>
          <div class="sidebar-brand-text mx-3">Pharmacy Management</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
          <a class="nav-link" href="dashboard.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <!-- <div class="sidebar-heading">
        Interface
      </div> -->

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Inventory</span>
          </a>
          <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <!-- <h6 class="collapse-header">Custom Components:</h6> -->
              <a class="collapse-item" href="inventory_add.php">Add New Medicine</a>
              <a class="collapse-item" href="inventory_view.php">Manage Inventory</a>
            </div>
          </div>
        </li>

        <!-- Nav Item - Utilities Collapse Menu -->
        <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSuppliers" aria-expanded="true" aria-controls="collapseSuppliers">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Suppliers</span>
          </a>
          <div id="collapseSuppliers" class="collapse" aria-labelledby="headingSuppliers" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <!-- <h6 class="collapse-header">Custom Utilities:</h6> -->
              <a class="collapse-item" href="supplier_add.php">Add New Supplier</a>
              <a class="collapse-item" href="supplier_view.php">Manage Suppliers</a>
            </div>
          </div>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseStock" aria-expanded="true" aria-controls="collapseStock">
            <i class="fas fa-fw fa-folder"></i>
            <span>Stock Purchase</span>
          </a>
          <div id="collapseStock" class="collapse" aria-labelledby="headingStock" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <!-- <h6 class="collapse-header">Login Screens:</h6> -->
              <a class="collapse-item" href="purchase.php">Add New Purchase</a>
              <div class="collapse-divider"></div>
            </div>
          </div>
        </li>


        <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCustomer" aria-expanded="true" aria-controls="collapseCustomer">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Customer</span>
          </a>
          <div id="collapseCustomer" class="collapse" aria-labelledby="headingCustomer" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <!-- <h6 class="collapse-header">Login Screens:</h6> -->
              <!-- <a class="collapse-item" href="customer_add.php">Add New Customer</a> -->
              <a class="collapse-item" href="customer_view.php">Manage Customer</a>
              <div class="collapse-divider"></div>
            </div>
          </div>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
          <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

      </ul>
      <!-- End of Sidebar -->

      <!-- Content Wrapper -->
      <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

          <!-- Topbar -->
          <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

            <!-- Sidebar Toggle (Topbar) -->
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
              <i class="fa fa-bars"></i>
            </button>


            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">

              <!-- Nav Item - Search Dropdown (Visible Only XS) -->

              <div class="topbar-divider d-none d-sm-block"></div>

              <!-- Nav Item - User Information -->
              <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['name'];  ?></span>
                  <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                  <a class="dropdown-item" href="#">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Profile
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                  </a>
                </div>
              </li>

            </ul>

          </nav>
          <!-- End of Topbar -->

          <!-- Begin Page Content -->
          <div class="container-fluid">

            <!-- Page Heading -->
            <!-- <div class="d-sm-flex align-items-center justify-content-between mb-4"> -->
            <!-- <center>
              <h1 class="h3 mb-0 text-gray-800">ADD NEW MEDICINES</h1>
            </center> -->
            <!-- </div> -->

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">UPDATE CUSTOMER DETAILS</h6>
              </div>
              <div class="card-body">
                <form action="customer_updateSave.php" method="post">
                  <input type="hidden" class="form-control form-control-user" name="ids" value="<?php echo $row['id'] ?>" required>
                  <?php if (isset($_GET['error'])) { ?>
                    <p style="background: #f2dede;
                                            color: #a94442;
                                            padding: 10px;
                                            width: 95%;
                                            border-radius: 5px;
                                            margin : 20px auto;
                                            align : center">
                      <?php echo $_GET['error'] ?>
                    </p>
                  <?php } ?>
                  <div class=" table-responsive">
                    <table id="dataTable" width="80%" cellspacing="0" cellpadding="20" align="center">
                      <tbody>
                        <tr align="center">
                          <th style="font-size: 1.2rem;">Name</th>
                          <td><input type="text" class="form-control form-control-user" name="customer_name" value="<?php echo $row['customer_name'] ?>"></td>

                          <th style=" font-size: 1.2rem;">Contact No.</th>
                          <td><input type="number" class="form-control form-control-user" name="customer_contact" value="<?php echo $row['customer_contact'] ?>"></td>
                        </tr>

                        <tr align="center">
                          <th style="font-size: 1.2rem;">Email</th>
                          <td><input type="email" class="form-control form-control-user" name="customer_email" value="<?php echo $row['customer_email'] ?>"></td>
                        </tr>

                        <tr align="center">
                          <td colspan="4"><input type="submit" value="Save Details" class="btn btn-primary" name="submit" style="width: 15rem; font-size: 1.2rem;"></td>
                        </tr>

                      </tbody>
                    </table>
                  </div>
              </div>
              </form>
            </div>
          </div>


        </div>
      </div>

      <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
      </a>

      <!-- Logout Modal-->
      <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
              <a class="btn btn-primary" href="logout.php">Logout</a>
            </div>
          </div>
        </div>
      </div>

      <!-- Bootstrap core JavaScript-->
      <script src="vendor/jquery/jquery.min.js"></script>
      <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

      <!-- Core plugin JavaScript-->
      <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

      <!-- Custom scripts for all pages-->
      <script src="js/sb-admin-2.min.js"></script>

      <!-- Page level plugins -->
      <script src="vendor/chart.js/Chart.min.js"></script>

      <!-- Page level custom scripts -->
      <script src="js/demo/chart-area-demo.js"></script>
      <script src="js/demo/chart-pie-demo.js"></script>

  </body>

  </html>
<?php
} else {
  header("Location: index.php");
  exit();
}
?>
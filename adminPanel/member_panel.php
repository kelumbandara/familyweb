<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Buttons</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="./assets/css/sb-admin-2.min.css" rel="stylesheet">

    <link rel="stylesheet" href="./assets/css/addBlog.css">

    <style>
        .preview-image {
            width: 100px;
            height: 100px;
            object-fit: cover;
            margin: 5px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        #options-panel {
            margin-top: 10px;
        }
    </style>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <!-- <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div> -->
                <div class="sidebar-brand-text mx-3">Sky Net Admin Panel</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>
            <li class="nav-item">
                <a class="nav-link" href="member_panel.php" data-target="#collapseUtilities" aria-expanded="true"
                    aria-controls="collapseUtilities">
                    <!-- <i class="fas fa-fw fa-wrench"></i> -->
                    <span>Member Panel</span>
                </a>

            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="blog_enter.php" data-target="#collapseTwo" aria-expanded="true"
                    aria-controls="collapseTwo">
                    <!-- <i class="fas fa-fw fa-cog"></i> -->
                    <span>Add News
                    </span>
                </a>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="add_gallery.php" data-target="#collapseUtilities" aria-expanded="true"
                    aria-controls="collapseUtilities">
                    <!-- <i class="fas fa-fw fa-wrench"></i> -->
                    <span>Add Gallery</span>
                </a>

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

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>
                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Douglas McGee</span>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
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
                    <h1 class="mb-5">Members</h1>



                    <?php
if (isset($_GET['appstatus'])) {
    if ($_GET['appstatus'] == 'Aproved') {
        // Alert for successful approval
        echo '<script>alert("User successfully approved.");</script>';
        echo '<script>window.history.replaceState({}, document.title, window.location.pathname);</script>';
    } elseif ($_GET['appstatus'] == 'error') {
        // Alert for error during approval
        echo '<script>alert("Error in approving user.");</script>';
    }
} elseif (isset($_GET['disstatus'])) {
    if ($_GET['disstatus'] == 'Disaprove') {
        // Alert for successful disapproval
        echo '<script>alert("User successfully disapproved.");</script>';
        echo '<script>window.history.replaceState({}, document.title, window.location.pathname);</script>';
    } elseif ($_GET['disstatus'] == 'error') {
        // Alert for error during disapproval
        echo '<script>alert("Error in disapproving user.");</script>';
    }
} elseif (isset($_GET['delete'])) {
    if ($_GET['delete'] == 'Delete') {
        // Alert for successful deletion
        echo '<script>alert("User successfully deleted.");</script>';
        echo '<script>window.history.replaceState({}, document.title, window.location.pathname);</script>';
    } elseif ($_GET['delete'] == 'error') {
        // Alert for error during deletion
        echo '<script>alert("Error in deleting user.");</script>';
    }
}
?>




                    <div class="row">
                        <div class="container-fluid">

                            <!-- DataTales Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    
                                                    <th>User Name</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Contact</th>
                                                    <th>Approve</th>
                                                    <th>DisAprove</th>
                                                    <th>Delete</th>

                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php
                                            include './include/connection.php';

                                            $sql="SELECT * FROM register";
                                            $result=mysqli_query($con,$sql);

                                            while($row=mysqli_fetch_assoc($result)){
                                                ?>

                                                <tr>
                                                    <td>
                                                        <?php echo $row['user_name']?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['Name']?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['email']?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['contact']?>
                                                    </td>
                                                    <?php
                                                    $usName = $row['user_name']; 

                                                   
                                                    $aproveSql = "SELECT * FROM register WHERE user_name = ? AND aprove = '0'";
                                                    $stmt = mysqli_prepare($con, $aproveSql);

                                                    if ($stmt) {
                                                       
                                                        mysqli_stmt_bind_param($stmt, "s", $usName);
                                                        mysqli_stmt_execute($stmt);
                                                        $aproveRequest = mysqli_stmt_get_result($stmt);

                                                        if ($aproveRow = mysqli_fetch_assoc($aproveRequest)) { ?>
                                                            <td>
                                                            <a class="table_delete_btn" href="include/memberAprove.php?member_aprovel=<?php echo $aproveRow['id']; ?>&value=1">
                                                                Approve
                                                            </a>
                                                            </td>
                                                        <?php
                                                        } else { ?>
                                                            <td><h6>Approved</h6></td>
                                                        <?php
                                                        }

                                                      
                                                        mysqli_stmt_close($stmt);
                                                    } else {
                                                      
                                                        echo "<td><h2>Error in query</h2></td>";
                                                    }
                                                    ?>
                                                    
                                                    <td>
                                                    <?php
                                                    $usName = $row['user_name']; 

                                                    // Query to check if the user is approved
                                                    $aproveSql = "SELECT id FROM register WHERE user_name = ? AND aprove = 1"; 
                                                    $stmt = mysqli_prepare($con, $aproveSql);

                                                    if ($stmt) {
                                                        // Bind parameters
                                                        mysqli_stmt_bind_param($stmt, "s", $usName);
                                                        // Execute the query
                                                        mysqli_stmt_execute($stmt);
                                                        // Get result
                                                        $aproveRequest = mysqli_stmt_get_result($stmt);

                                                        // Check if the user is approved
                                                        if ($aproveRow = mysqli_fetch_assoc($aproveRequest)) { ?>
                                                            <a class="table_delete_btn" href="./include/memberAprove.php?member_disaprovel=<?php echo $aproveRow['id']; ?>&value=0">
                                                                Disapprove
                                                            </a>
                                                        <?php
                                                        } else {
                                                            // If the user is not approved, show "Not Approved"
                                                            echo "<h6>Not Approved</h6>";
                                                        }

                                                        // Close the statement
                                                        mysqli_stmt_close($stmt);
                                                    } else {
                                                        // If query preparation fails, show a generic error
                                                        echo "<h2>Error in query</h2>";
                                                    }
                                                    ?>
                                                </td>

<td>
    <?php
    $usName = $row['user_name']; 

    // Query to get the user's ID for deletion
    $deleteSql = "SELECT id FROM register WHERE user_name = ?"; 
    $stmt = mysqli_prepare($con, $deleteSql);

    if ($stmt) {
        // Bind parameters
        mysqli_stmt_bind_param($stmt, "s", $usName);
        // Execute the query
        mysqli_stmt_execute($stmt);
        // Get result
        $deleteRequest = mysqli_stmt_get_result($stmt);

        // Check if the user exists for deletion
        if ($deleteRow = mysqli_fetch_assoc($deleteRequest)) { ?>
            <a class="table_delete_btn" href="./include/memberAprove.php?member_delete=<?php echo $deleteRow['id']; ?>">Delete</a>
        <?php
        } else {
            // If no user found, display an error message
            echo "<h2>No user found</h2>";
        }

        // Close the statement
        mysqli_stmt_close($stmt);
    } else {
        // If query preparation fails, show a generic error
        echo "<h2>Error in query</h2>";
    }
    ?>
</td>







                                                    
                                                </tr>



                                                <?php
                                            }
                                        
                                        ?>




                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
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
                    <a class="btn btn-primary" href="../logout.php">Logout</a>
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
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="./assets/js/demo/datatables-demo.js"></script>

    <script src="./assets/js/submit_multipleImg.js"></script>


</body>

</html>
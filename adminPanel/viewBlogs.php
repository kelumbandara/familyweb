<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Dashboard</title>

    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="./assets/css/sb-admin-2.min.css" rel="stylesheet">

    <link rel="stylesheet" href="./assets/css/style.css">

    <link rel="stylesheet" href="./assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/blog_style.css">

    <style>
        .gallery_body {
            font-family: Lato, sans-serif;
            margin: 0;
            padding: 1rem;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .figure_img {
            width: 100%;
            display: block;
            aspect-ratio: 1 / 1;
            object-fit: cover;
            transition: transform 1000ms;
        }

        ul {
            list-style: none;
            margin: 0;
            padding: 0;
            display: grid;
            gap: 0.5rem;
            grid-template-columns: repeat(auto-fit, minmax(20rem, 1fr));
            max-width: 100%;
            width: 70rem;
        }

        .gallery_figure {
            margin: 0;
            position: relative;
            overflow: hidden;
        }

        .gallery_figure::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 200%;
            height: 200%;
            background: rgba(0, 0, 0, 0.5);
            transform-origin: center;
            opacity: 0;
            transform: scale(2);
            transition: opacity 300ms;
        }


        a:is(:hover, :focus) {
            opacity: 1;
        }

        a:is(:hover, :focus) {
            opacity: 1;
            transition: opacity 600ms;
        }

        @media (prefers-reduced-motion: no-preference) {


            .gallery_figure::after {
                border-radius: 50%;
                opacity: 1;
                transform: scale(0);
                transition: transform 900ms;
            }

            a:is(:hover, :focus) .gallery_figure::after {
                transform: scale(2.5);
            }

            a:is(:hover, :focus) .figure_title {
                opacity: 1;
                transform: translate3d(0, 0, 0);
                transition: opacity 600ms 400ms, transform 600ms 400ms;
            }

            a:is(:hover, :focus) img {
                transform: scale(1.2);
            }
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

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="blog_enter.php" data-target="#collapseTwo" aria-expanded="true"
                    aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Add News
                    </span>
                </a>
                <!-- <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Components:</h6>
                        <a class="collapse-item" href="buttons.html">Buttons</a>
                        <a class="collapse-item" href="cards.html">Cards</a>
                    </div>
                </div> -->
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="./add_gallery.php" data-target="#collapseUtilities" aria-expanded="true"
                    aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
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

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Douglas McGee</span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
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
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">View Blog</h1>

                    </div>


                    <?php
                    if (isset($_REQUEST['blog_id'])) {
                        $id = $_REQUEST['blog_id'];

                        include './include/connection.php';

                        // Query to fetch blog details along with all images
                        $blog_sql = "SELECT * FROM blogs b JOIN blog_images bi ON b.id = bi.blog_id WHERE b.id = $id";
                        $blog_result = mysqli_query($con, $blog_sql);

                        if ($blog_result) {
                            $blog_row = mysqli_fetch_assoc($blog_result);
                            ?>
                    <!-- Content Row -->
                    <div class="row">
                        <!-- Blog -->
                        <div class="mt-5" style="margin-top: 105px !important;">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-8 mb-5">
                                        <!-- featured Details -->
                                        <section class="section" id="featured">
                                            <div class="detail">
                                                <img src="./blogImages/blogTitle/<?php echo $blog_row['image']; ?>"
                                                    style="width: 500px; height: 300px; object-fit: cover;"
                                                    class="img-fluid" alt="...">
                                                <div class="post-cat mt-5">
                                                    <a href="#" class="btn">Journal</a>
                                                    <a href="#" class="btn">Life Style</a>
                                                    <div class="meta mt-3 ">
                                                        <a class="profile" href="#"><i class="fas fa-user ml-2"></i>
                                                            <span>Darisset</span>
                                                        </a> -
                                                        <span>San, 12 Mei 2020</span>
                                                    </div>
                                                </div>
                                                <div class="article mt-3">
                                                    <h1>
                                                        <?php echo $blog_row['heading']; ?>
                                                    </h1>

                                                    <?php
                                        // Get the content from the database
                                        $content = $blog_row['content']; // Replace 'content_column' with the actual column name from your database

                                        // Split the content into paragraphs by period (or use any delimiter you want)
                                        $paragraphs = explode('.', $content); // This will split the content at each period

                                        // Loop through the paragraphs and display them
                                        foreach ($paragraphs as $paragraph) {
                                            if (!empty(trim($paragraph))) {
                                                echo '<p>' . htmlspecialchars(trim($paragraph)) . '.</p>';
                                            }
                                        }
                                        ?>

                                                    <figcaption class="blockquote-footer mt-5">
                                                        <span>#Tags: </span>
                                                        <cite title="Source Title">Python, Django, Web
                                                            Development</cite>
                                                    </figcaption>
                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Gallery Section -->
                        <div class="row">
                            <section class="gallery_body">
                                <ul>
                                <?php
                                // Move the pointer back to the first row for images
                                mysqli_data_seek($blog_result, 0); // Reset the pointer to the beginning of the result set
                                while ($image_row = mysqli_fetch_assoc($blog_result)) {
                                        ?>
                                                <li>
                                                    <a href="">
                                                        <figure class="gallery_figure">
                                                            <img class="figure_img"
                                                                src='./blogImages/blogGalleries/<?php echo $image_row['blog_images']; ?>'>

                                                        </figure>
                                                    </a>
                                                </li>
                                <?php
                                    }
                                    ?>
                                            </ul>
                                        </section>
                                    </div>
                    </div>
                                <!-- End of Content Row -->

                    <?php
                        } else {
                         echo "Error: " . mysqli_error($con);  // For debugging
                        }
                     }
                        ?>


                    <!-- Footer -->
                    <footer class="sticky-footer bg-white">
                        <div class="container my-auto">
                            <div class="copyright text-center my-auto">
                                <span>Copyright &copy; Your Website 2021</span>
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
                        </div>
                        <div class="modal-body">Select "Logout" below if you are ready to end your current session.
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <a class="btn btn-primary" href="login.html">Logout</a>
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


            <!-- Optional JavaScript -->
            <!-- Popper.js first, then Bootstrap JS -->
            <script src="../assets/js/popper.min.js"></script>
            <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
            <script src="../assets/js/script.js"></script>






</body>

</html>
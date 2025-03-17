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

    <!-- <link rel="stylesheet" href="./assets/css/addBlog.css"> -->

    <link rel="stylesheet" href="./assets/css/style.css">

    <link rel="stylesheet" href="../assets/css/gallery.css">

    <link rel="stylesheet" href="../assets/css/lightbox.min.css">

    <link rel="stylesheet" href="./assets/css/addBlog.css">

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
                                <!-- <img class="img-profile rounded-circle" src="img/undraw_profile.svg"> -->
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
                    <h1 class="mb-5">Dashboard</h1>
                    <div class="blog">
                        <div class="container">

                            <div class="row">
                                <!-- Content Column -->
                                <div class="col-lg-12 mb-4" style="text-align: center;">

                                    <div class="mb-4">
                                        <div class="load_more_container">
                                            <div class="box-container">
                                                <?php
                                                    include './include/connection.php';
                                                    $sql = "SELECT * FROM blogs";
                                                    $result = mysqli_query($con, $sql);
                                                    $count = 0; // Track the number of posts
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                        $count++;
                                                ?>
                                                <article class="box">
                                                    <div class="article-wrapper">
                                                        <figure>
                                                            <img src="./assets/blogImages/blogTitle/<?php echo $row['image']; ?>"
                                                                alt="">
                                                        </figure>
                                                        <div class="article-body">
                                                            <a href="viewBlogs.php?blog_id=<?php echo $row['id']; ?>"
                                                                style="text-decoration: none;">
                                                                <h2>
                                                                    <?php echo $row['heading']; ?>
                                                                </h2>
                                                            </a>
                                                            <p class="content-text">
                                                                <?php
                                                                    // Limit content to first 20 words
                                                                    $content = $row['content'];
                                                                    $contentArray = explode(' ', $content);
                                                                    echo (count($contentArray) > 25) 
                                                                        ? implode(' ', array_slice($contentArray, 0, 20)) . '...' 
                                                                        : $content;
                                                                    ?>
                                                            </p>
                                                            <div class="row">
                                                                <div class="col-lg-6"
                                                                    style="position: absolute; bottom: 10px; left: 0px;">
                                                                    <a class="dropdown-item" href="#"
                                                                        data-toggle="modal"
                                                                        data-target="#UpdateModal-<?php echo $row['id']; ?>">
                                                                        Edit More
                                                                    </a>
                                                                    <form action="./include/blogAddBack.php"
                                                                        method="POST" enctype="multipart/form-data">
                                                                        <div class="modal fade"
                                                                            id="UpdateModal-<?php echo $row['id']; ?>"
                                                                            tabindex="-1" role="dialog"
                                                                            aria-labelledby="exampleModalLabel"
                                                                            aria-hidden="true">
                                                                            <div class="modal-dialog" role="document">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <h5 class="modal-title"
                                                                                            id="exampleModalLabel">
                                                                                            Already want to Update?</h5>
                                                                                    </div>
                                                                                    <div class="modal-body">
                                                                                        <div class="container_drop">
                                                                                            <!-- Drag & Drop Area -->
                                                                                            <div class="drop-area"
                                                                                                id="drop-area-<?php echo $row['id']; ?>">
                                                                                                <i
                                                                                                    class='bx bxs-cloud-upload icon'></i>
                                                                                                <h3>Drag and drop or
                                                                                                    click here to select
                                                                                                    images</h3>
                                                                                                <p>Image size must be
                                                                                                    less than
                                                                                                    <span>2MB</span>
                                                                                                </p>
                                                                                                <input type="file"
                                                                                                    name="head_img"
                                                                                                    accept="image/*"
                                                                                                    id="input-file-<?php echo $row['id']; ?>"
                                                                                                    hidden>
                                                                                            </div>

                                                                                            <div class="clear-area">
                                                                                                <a href="#"
                                                                                                    id="clear-btn-<?php echo $row['id']; ?>"
                                                                                                    class="clear clear-btn"
                                                                                                    style="display: none;">Clear
                                                                                                    Image</a>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="form-container">
                                                                                        <div class="form-group">
                                                                                            <label
                                                                                                for="title">Title</label>
                                                                                            <input type="hidden"
                                                                                                id="title"
                                                                                                name="blog_up_id"
                                                                                                value="<?php echo $row['id']; ?>">
                                                                                            <input type="text"
                                                                                                id="title" name="title"
                                                                                                value="<?php echo $row['heading']; ?>">
                                                                                        </div>

                                                                                        <div class="form-group">
                                                                                            <label
                                                                                                for="author">Author</label>
                                                                                            <input type="text"
                                                                                                id="author"
                                                                                                name="author"
                                                                                                value="<?php echo $row['Author']; ?>">
                                                                                        </div>

                                                                                        <div class="form-group">
                                                                                            <label
                                                                                                for="category">Category</label>
                                                                                            <select id="category"
                                                                                                name="category">
                                                                                                <option value="news">
                                                                                                    News</option>
                                                                                                <option value="blog">
                                                                                                    Blog</option>
                                                                                                <option value="opinion">
                                                                                                    Opinion</option>
                                                                                                <option value="other">
                                                                                                    Other</option>
                                                                                            </select>
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label
                                                                                                for="content">Content</label>
                                                                                            <textarea id="content"
                                                                                                name="content"
                                                                                                rows="5"><?php echo $row['content']; ?></textarea>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="modal-footer">
                                                                                        <button
                                                                                            class="btn btn-secondary"
                                                                                            type="button"
                                                                                            data-dismiss="modal">Cancel</button>
                                                                                        <button type="submit"
                                                                                            class="btn btn-primary"
                                                                                            name="update_blog">Update</button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                                <div class="col-lg-6"
                                                                    style="position: absolute; bottom: 10px; right: 0px;">
                                                                    <?php if (count($contentArray) > 25) { ?>
                                                                    <a href="viewBlogs.php?blog_id=<?php echo $row['id']; ?>"
                                                                        class="read-more-btn">Read more</a>
                                                                    <?php } ?>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </article>
                                                <?php } ?>
                                            </div>

                                            <div class="buttons">
                                                <div id="load-more">Load More</div>
                                                <div id="show-less" style="display: none;">Show Less</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="row">

                                <section class="portfolio" id="Portfolio" style="text-align: center;">
                                    <h1 class="mb-5">Gallery</h1>
                                    <div class="container">

                                        <div class="row">

                                            <div class="filter-buttons">
                                                <ul id="filter-btns">
                                                    <li class="active" data-target="all">ALL</li>
                                                    <li data-target="family">FAMILY</li>
                                                    <li data-target="office">OFFICE</li>

                                                </ul>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="portfolio-gallery">

                                                <?php
                                $gallery_sql="SELECT * FROM image_gallery";
                                $gallery_result=mysqli_query($con,$gallery_sql);
                                if($gallery_result){
                                    while($gallery_row=mysqli_fetch_assoc($gallery_result)){
                                        ?>
                                                <div class="item" data-id="<?php echo $gallery_row['category']?>">
                                                    <div class="inner">
                                                        <a href="./assets/imagesLibrary/<?php echo $gallery_row['image']?>"
                                                            data-lightbox="mygallery"><img
                                                                src="./assets/imagesLibrary/<?php echo $gallery_row['image']?>"
                                                                alt="portfolio"></a>

                                                    </div>
                                                </div>
                                                <?php
                    }
                }

                ?>





                                            </div>
                                        </div>
                                    </div>
                                </section>
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

    <script src="./assets/js/script.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="./assets/js/sb-admin-2.min.js"></script>

    <script src="./assets/js/load_more.js"></script>


    <script src="../assets/js/galley.js"></script>

    <script src="../assets/js/lightbox-plus-jquery.min.js"></script>

    <script src="./assets/js/image_drag.js"></script>

</body>

</html>
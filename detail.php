<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="./assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/blog_style.css">
    <link rel="stylesheet" href="./assets/fontawesome/css/all.min.css">




    <!-- ________________Font Awesome icons________________ -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <!-- ________________Footer CSS________________ -->
    <link rel="stylesheet" href="./assets/css/homePage.css">

    <!-- ________________Boxicons________________ -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

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

        .figure_ul {
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

<body>


<?php
session_start();
include './backEnd/connection.php';

        // Default profile image
        $profileImage = "./image/Memberimages/avatar1.png";

        // Check if the user is logged in (employee or admin)
        if (isset($_SESSION['UsName']) || isset($_SESSION['adminId'])) {
            // Determine if the user is an employee or admin
            if (isset($_SESSION['UsName'])) {
                // Employee session
                $user = $_SESSION["UsName"];
                $role = 'employee'; // Employee role

            // Securely fetch user data using prepared statements
            $query = "SELECT * FROM register WHERE user_name = ?";
            $stmt = mysqli_prepare($con, $query);
            mysqli_stmt_bind_param($stmt, "s", $user);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if ($row = mysqli_fetch_assoc($result)) {
                $profileImage = !empty($row['image']) ? "./image/Memberimages/{$row['image']}" : $profileImage;
            } else {
                header("Location: loginPage.php");
                exit();
            }

    } elseif (isset($_SESSION['adminId'])) {
        // Admin session
        $user = $_SESSION["adminName"];
        $role = 'admin'; // Admin role
        $profileImage = "./image/Memberimages/avatar1.png"; // Custom admin image, change as needed

        // Securely fetch admin data using prepared statements
        $query = "SELECT * FROM admin_login WHERE user_name = ?";
        $stmt = mysqli_prepare($con, $query);
        mysqli_stmt_bind_param($stmt, "s", $user);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($row = mysqli_fetch_assoc($result)) {
            // Profile image for admin if any, else default image
            $profileImage = !empty($row['image']) ? "./image/Memberimages/{$row['image']}" : $profileImage;
        } else {
            header("Location: loginPage.php");
            exit();
        }
    }

    // Render the navigation bar based on role
    ?>
    <nav>
        <div class="nav_bar">
            <i class='bx bx-menu sideBarOpen'></i>
            <span class="logo"><a href="#">Skynet</a></span>

            <div class="menu">
                <div class="logo_toggle">
                    <span class="logo"><a href="#">Skynet</a></span>
                    <i class='bx bx-x sidebarClose'></i>
                </div>

                <ul class="nav_links">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="#">Family Tree</a></li>
                    <li><a href="blog.php">News & Updates</a></li>
                </ul>
            </div>

            <div class="login_profile">
                <?php if (isset($_SESSION['UsName']) || isset($_SESSION['adminId'])): ?>
                    <div class="profile_button">
                        <a href="#" onclick="toggleMenu()">
                            <img src="<?php echo htmlspecialchars($profileImage); ?>" alt="User Profile">
                        </a>
                    </div>

                    <div class="sub_menu_wrap" id="subMenu">
                        <div class="sub_menu">
                            <div class="user_info">
                                <img src="<?php echo htmlspecialchars($profileImage); ?>" alt="User Profile">
                                <?php echo htmlspecialchars($user); ?>
                            </div>
                            <hr>
                            <a href="./profile.php?user=<?php echo urlencode($user); ?>" class="sub_menu_links">
                                <img src="./image/profile.png">
                                <p>Edit Profile</p>
                                <span>></span>
                            </a>
                            <!-- <a href="#" class="sub_menu_links">
                                <img src="./image/setting.png">
                                <p>Help & Support</p>
                                <span>></span>
                            </a> -->
                            <?php if ($role == 'admin'): ?>
                                <a href="./adminPanel/index.php" class="sub_menu_links">
                                    <img src="./image/setting.png">
                                    <p>Admin Panel</p>
                                    <span>></span>
                                </a>
                            <?php endif; ?>
                            <a href="./logout.php" class="sub_menu_links">
                                <img src="./image/profile.png">
                                <p>Log Out</p>
                                <span>></span>
                            </a>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="login_button">
                        <a href="loginPage.php"><i class='bx bx-log-in'></i> Login</a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </nav>
    <?php
} else { ?>
   
   <nav>
        <div class="nav_bar">
            <i class='bx bx-menu sideBarOpen'></i>
            <span class="logo"><a href="#">Skynet</a></span>

            <div class="menu">
                <div class="logo_toggle">
                    <span class="logo"><a href="#">Skynet</a></span>
                    <i class='bx bx-x sidebarClose'></i>
                </div>

                <ul class="nav_links">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="#">Family Tree</a></li>
                    <li><a href="blog.php">News & Updates</a></li>
                </ul>
            </div>

            <div class="login_profile">
                    <div class="login_button">
                        <a href="loginPage.php"><i class='bx bx-log-in'></i> Login</a>
                    </div>
            </div>
        </div>
    </nav>
   <?php
}

?>

   <!-- Page Heading -->
   <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">View Blog</h1>

                    </div>


                    <?php
                    if (isset($_REQUEST['blog_id'])) {
                        $id = $_REQUEST['blog_id'];

                        include './backEnd/connection.php';

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
                                                <img src="./adminPanel/blogImages/blogTitle/<?php echo $blog_row['image']; ?>"
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
                                       
                                        $content = $blog_row['content']; 

                                        
                                        $paragraphs = explode('.', $content);

                                        
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
                                <ul class="figure_ul">
                                <?php
                              
                                mysqli_data_seek($blog_result, 0); 
                                while ($image_row = mysqli_fetch_assoc($blog_result)) {
                                        ?>
                                                <li>
                                                    <a href="">
                                                        <figure class="gallery_figure">
                                                            <img class="figure_img"
                                                                src='./adminPanel/blogImages/blogGalleries/<?php echo $image_row['blog_images']; ?>'>

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
                         echo "Error: " . mysqli_error($con); 
                        }
                     }
                        ?>

    <footer>
        <section class="footer_sec">
            <div class="container">
                <div class="sec aboutus">
                    <h2>About Us</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa laboriosam quod cupiditate,
                        sapiente vitae odio mollitia. Id molestias similique dolor consequuntur accusantium dicta amet
                        temporibus iusto explicabo quia, corporis at sed sapiente quibusdam doloribus perspiciatis?
                    </p>

                    <ul class="sci">
                        <li><a href="#"><i class='bx bxl-facebook-circle'></i></a></li>
                        <li><a href="#"><i class='bx bxl-instagram-alt'></i></a></li>
                        <li><a href="#"><i class='bx bxl-twitter'></i></a></li>
                        <li><a href="#"><i class='bx bxl-youtube'></i></a></li>
                    </ul>
                </div>


                <div class="sec quickLinks">
                    <h2>Quick Links</h2>
                    <ul>
                        <li><a href="">About</a></li>
                        <li><a href="">FAQ</a></li>
                        <li><a href="">Privacy Policy</a></li>
                        <li><a href="">Help</a></li>
                        <li><a href="">Terms & Consitions</a></li>
                        <li><a href="">Contact Us</a></li>
                    </ul>
                </div>

                <div class="sec contactInfo">
                    <h2>Contact Info</h2>
                    <ul class="info">
                        <li>
                            <span><i class='bx bxs-map'></i></span>
                            <span> 138/2-3 Kynsey Road, 07 <br>Colombo</span>
                        </li>
                        <li>
                            <span><i class='bx bxs-phone'></i></span>
                            <p><a href="tel:94778557554">+94 77 855 7554</a><br><a href="tel:94778557554">+94 77 855
                                    7554</a></p>
                        </li>
                        <li>
                            <span><i class='bx bxl-gmail'></i></span>
                            <p><a href="mailto:knowmore@gmail.com">knowmore@gmail.com</a></p>
                        </li>
                    </ul>
                </div>

            </div>
        </section>
    </footer>
    <div class="copyrightText">
        <p>Copyright © 2025 SkyNet. All Rights Reserved.</p>
    </div>


    <!-- Optional JavaScript -->
    <!-- Popper.js first, then Bootstrap JS -->
    <script src="./assets/js/popper.min.js"></script>
    <script src="./assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="./assets/js/script.js"></script>

    <script src="assets/js/header.js"></script>
</body>

</html>
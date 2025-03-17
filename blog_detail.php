<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="icon" type="image/png" href="./assets/images/images.png">

    <link rel="stylesheet" href="./assets/css/blog_detail.css">
    <link rel="stylesheet" href="./assets/css/lightbox.min.css">

    <link rel="stylesheet" href="assets/css/homePage.css">

    <!-- ________________Font Awesome icons________________ -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <!-- ________________Footer CSS________________ -->
    <link rel="stylesheet" href="assets/css/footer.css">

    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css">
</head>

<body>
    <?php
session_start();
include './backEnd/connection.php';

// Default profile image
$profileImage = "./assets/images/Member images/avatar1.png";

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
            $profileImage = !empty($row['image']) ? "./assets/images/Member images/{$row['image']}" : $profileImage;
        } else {
            header("Location: loginPage.php");
            exit();
        }

    } elseif (isset($_SESSION['adminId'])) {
        // Admin session
        $user = $_SESSION["adminName"];
        $role = 'admin'; // Admin role
        $profileImage = "./assets/images/Member images/avatar1.png"; // Custom admin image, change as needed

        // Securely fetch admin data using prepared statements
        $query = "SELECT * FROM admin_login WHERE user_name = ?";
        $stmt = mysqli_prepare($con, $query);
        mysqli_stmt_bind_param($stmt, "s", $user);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($row = mysqli_fetch_assoc($result)) {
            // Profile image for admin if any, else default image
            $profileImage = !empty($row['image']) ? "./assets/images/Member images/{$row['image']}" : $profileImage;
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
                    <li><a href="gallery.php">Gallery</a></li>
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
                        <?php if ($role == 'employee'): ?>
                        <a href="./profile.php?user=<?php echo urlencode($user); ?>" class="sub_menu_links">
                            <img src="./assets/images/profile.png">
                            <p>Edit Profile</p>
                            <span>></span>
                        </a>
                        <?php endif; ?>
                        <?php if ($role == 'employee'): ?>
                        <a href="./profile.php?user=<?php echo urlencode($user); ?>#add-blogs" class="sub_menu_links">
                            <img src="./assets/images/blog.png">
                            <p>Add Blogs</p>
                            <span>></span>
                        </a>
                        <?php endif; ?>
                        <?php if ($role == 'employee'): ?>
                        <a href="./profile.php?user=<?php echo urlencode($user); ?>#add-images-to-gallery" class="sub_menu_links">
                            <img src="./assets/images/image.png">
                            <p>Add Gallery</p>
                            <span>></span>
                        </a>
                        <?php endif; ?>
                        <?php if ($role == 'admin'): ?>
                        <a href="./adminPanel/index.php" class="sub_menu_links">
                            <img src="./assets/images/setting.png">
                            <p>Admin Panel</p>
                            <span>></span>
                        </a>
                        <?php endif; ?>
                        <a href="./logout.php" class="sub_menu_links">
                            <img src="./assets/images/logout.png">
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
                    <li><a href="gallery.php">Gallery</a></li>
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


    <?php

    if(isset($_REQUEST['blog_id'])){
        $blog_id=$_REQUEST['blog_id'];
        $blog_single_sql="SELECT * FROM blogs where id ='$blog_id'";
        $single_result=mysqli_query($con,$blog_single_sql);
        if($single_result){
            $single_row=mysqli_fetch_assoc($single_result);
        ?>
    <div class="header"
        style="background: linear-gradient(to bottom, rgba(0,0,0,0.5) 0%, rgba(0,0,0,.5) 100%),url('./adminPanel/assets/blogImages/blogTitle/<?php echo $single_row['image']?>');"></div>

    <section class="body">

        <div class="blog_items">

            <div class="title">
                <a href="#" class="blog_title">
                    <h3>
                        <?php echo $single_row['heading']?>
                    </h3>
                </a>
                <div class="blog_author">
                    <h4>
                        <?php echo $single_row['Author']?>
                    </h4>
                </div>
            </div>
            <div class="content">
                <p class="blog_content">
                <?php
                                                   
                                                   $content = $single_row['content']; 
                                                  
                                                   $paragraphs = explode('.', $content); 


                                                   foreach ($paragraphs as $paragraph) {
                                                       if (!empty(trim($paragraph))) {
                                                           echo '<p>' . htmlspecialchars(trim($paragraph)) . '.</p>';
                                                       }
                                                   }
                                               ?> 
                </p>
            </div>

            <div class="image_section">
                <div class="gallery">
                    <?php
                $blog_gallery_img=$single_row['id'];
                $blog_gallery_single_sql="SELECT * FROM blog_images where blog_id='$blog_gallery_img'";
                $Blog_images_result=mysqli_query($con,$blog_gallery_single_sql);


                while($single_row_images=mysqli_fetch_assoc($Blog_images_result)){
                    ?>
                    <a href="./adminPanel/assets/blogImages/blogGalleries/<?php echo $single_row_images['blog_images']?>"
                        data-lightbox="mygallery"><img
                            src="./adminPanel/assets/blogImages/blogGalleries/<?php echo $single_row_images['blog_images']?>"
                            alt="portfolio"></a>
                    <?php
                }
                ?>
                </div>
            </div>


        </div>
    </section>

    <?php
        }
    }

?>





    <!-- Footer Start -->
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





    <script src="./assets/js/lightbox-plus-jquery.min.js"></script>

    <script src="assets/js/header.js"></script>
    <script src="assets/js/member.js"></script>

    <script src="assets/js/script.js"></script>



</body>



</html>
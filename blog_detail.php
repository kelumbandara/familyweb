<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="./assets/css/blog_detail.css">
    <link rel="stylesheet" href="./assets/css/lightbox.min.css">

    <link rel="stylesheet" href="assets/css/homePage.css">

     <!-- ________________Family Members CSS________________ -->
     <link rel="stylesheet" href="assets/css/memberSlider.css">

     <!-- ________________Font Awesome icons________________ -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

<!-- ________________Footer CSS________________ -->
<link rel="stylesheet" href="assets/css/footer.css">
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

    <div class="header">
        some content
    </div>


    <div class="blog_items">
        <div class="title">
            <a href="#" class="blog_title">
                <h3>Hello</h3>
            </a>
            <div class="blog_author">
                <h4>clarck</h4>
            </div>
        </div>
        <div class="content">
            <p class="blog_content">content</p>
        </div>
        <div class="image_section">
            <div class="gallery">
                <a href="https://picsum.photos/id/1028/300/300" data-lightbox="mygallery"><img src="https://picsum.photos/id/1028/300/300" alt="a forest after an apocalypse"></a>
                <a href="https://picsum.photos/id/15/300/300" data-lightbox="mygallery"><img src="https://picsum.photos/id/15/300/300" alt="a waterfall and many rocks"></a>
                <a href="https://picsum.photos/id/1040/300/300" data-lightbox="mygallery"><img src="https://picsum.photos/id/1040/300/300" alt="a house on a mountain"></a>
                <a href="https://picsum.photos/id/106/300/300" data-lightbox="mygallery"><img src="https://picsum.photos/id/106/300/300" alt="sime pink flowers"></a>
                <a href="https://picsum.photos/id/136/300/300" data-lightbox="mygallery"><img src="https://picsum.photos/id/136/300/300" alt="big rocks with some trees"></a>
                <a href="https://picsum.photos/id/1039/300/300" data-lightbox="mygallery"><img src="https://picsum.photos/id/1039/300/300" alt="a waterfall, a lot of tree and a great view from the sky"></a>
                <a href="https://picsum.photos/id/110/300/300" data-lightbox="mygallery"><img src="https://picsum.photos/id/110/300/300" alt="a cool landscape"></a>
            </div>
        </div>
        
       
    </div>

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
</body>



</html>
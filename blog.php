<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.css" integrity="sha512-HHsOC+h3najWR7OKiGZtfhFIEzg5VRIPde0kB0bG2QRidTQqf+sbfcxCTB16AcFB93xMjnBIKE29/MjdzXE+qw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./assets/css/blog.css">
    <title>News Website</title>

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
        <div class="logo">
            NEWS
        </div>
        <nav>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#sportsNews">Sports</a></li>
                <li><a href="#businessNews">Business</a></li>
                <li><a href="#techNews">Technology</a></li>
            </ul>
            <div class="bar">
                <i class="open fa-solid fa-bars-staggered"></i>
                <i class="close fa-solid fa-xmark"></i>
            </div>
        </nav>
    </div>
    <div class="topHeadlines">
        <div class="left">
            <div class="title">
                <h2>Breaking News</h2>
            </div>
            <div class="img" id="breakingImg">
                <img src="" alt="">
            </div>
            <div class="text" id="breakingNews">
                <div class="title">
                    <h1>Lorem ipsum dolor sit amet consectetur adipisicing elit.</h1>
                </div>
                <div class="description">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus, veritatis? Eveniet ut amet expedita itaque dolore delectus? Tenetur eius animi distinctio voluptatem vitae itaque dolorum architecto illo, expedita, dignissimos reprehenderit.
                </div>
            </div>
        </div>
        <div class="right">
            <div class="title">
                <h2>Top Headlines</h2>
            </div>
            <div class="topNews">
                <div class="news">
                    <div class="img"></div>
                    <div class="text">
                        <div class="title">
                            <a href="#">
                                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quae magnam </p>
                            </a>
                            
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="page2">
        <div class="news" id="sportsNews">
            <div class="title">
                <h2>Sports News</h2>
            </div>
            <div class="newsBox">
                <div class="newsCard">
                    <div class="img">
                        <img src="" alt="">
                    </div>
                    <div class="text">
                        <div class="title">
                            <a href="#"><p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Fugiat, ad pariatur?</p></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="news" id="businessNews">
            <div class="title">
                <h2>Business News</h2>
            </div>
            <div class="newsBox">
                <div class="newsCard">
                    <div class="img">
                        <img src="" alt="">
                    </div>
                    <div class="text">
                        <div class="title">
                            <a href="#"><p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Fugiat, ad pariatur?</p></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="news" id="techNews">
            <div class="title">
                <h2>Technology News</h2>
            </div>
            <div class="newsBox">
                <div class="newsCard">
                    <div class="img">
                        <img src="" alt="">
                    </div>
                    <div class="text">
                        <div class="title">
                            <a href="#"><p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Fugiat, ad pariatur?</p></a>
                        </div>
                    </div>
                </div>
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


    


    <!-- <script src="./b   log.js"></script> -->

    <script src="assets/js/header.js"></script>
    <script src="assets/js/member.js"></script>

</body>
</html>
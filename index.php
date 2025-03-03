<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="./image/images.png">
    <title>Skynet</title>
    <!-- ________________CSS________________ -->
    <link rel="stylesheet" href="assets/css/homePage.css">

    <!-- ________________Boxicons________________ -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!-- ________________Bootstrap________________ -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script> -->

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
                    <?php if ($role == 'admin'): ?>
                        <li><a href="admin_panel.php">Admin Panel</a></li>
                    <?php endif; ?>
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
} else {
    // Redirect to login if the user is not logged in
    header("Location: loginPage.php");
    exit();
}

?>



<!-- Header Start -->

<!-- Header End -->



    <!-- Hero Section Start -->
    <section class="heroPage" id="home">
        <div class="content flex">
            <div class="text">
                <h1>Welcome To our Family website</h1>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Officiis quam provident, culpa minus fugiat
                    a!</p>
            </div>
            <a href="#">Our Services</a>
        </div>
    </section>
    <!-- Hero Section End -->


    <!-- About Us Start -->
    <section class="about">
        <div class="container">
            <div class="section_title">
                <h2>About Us</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit, aliquam.</p>
            </div>
            <div class="row family_info">
                <div class="left">
                    <h3>Our Family Story</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque fugiat cumque alias sint culpa
                        temporibus mollitia, provident earum eius delectus animi iste dolores iusto, tempora vero nobis
                        optio labore nemo?</p>
                </div>

                <div class="right">
                    <h3>Our Family Vision</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque fugiat cumque alias sint culpa
                        temporibus mollitia, provident earum eius delectus animi iste dolores iusto, tempora vero nobis
                        optio labore nemo?</p>
                </div>


            </div>

        </div>
    </section>
    <!-- About Us End -->

    <!-- Family Members Start -->

    <div class="section_title_mem">
        <h1>Our Members</h1>
        <section class="Members">
            <div class="wrapper">
                <i id="left" class="fa fa-arrow-left" aria-hidden="true"></i>
                <ul class="carousel">
                    <li class="card">
                        <div class="img"><img src="assets/images/Member images/img-1.jpg" alt="" draggable="false">
                        </div>
                        <h2>Balance Pearson</h2>
                        <span>Sales Manager</span>
                    </li>
                    <li class="card">
                        <div class="img"><img src="assets/images/Member images/img-2.jpg" alt="" draggable="false">
                        </div>
                        <h2>Joenas Brauers</h2>
                        <span>Web Developer</span>
                    </li>
                    <li class="card">
                        <div class="img"><img src="assets/images/Member images/img-3.jpg" alt="" draggable="false">
                        </div>
                        <h2>Lariach French</h2>
                        <span>Online Teacher</span>
                    </li>
                    <li class="card">
                        <div class="img"><img src="assets/images/Member images/img-4.jpg" alt="" draggable="false">
                        </div>
                        <h2>James Khosravi</h2>
                        <span>Freelancer</span>
                    </li>
                    <li class="card">
                        <div class="img"><img src="assets/images/Member images/img-5.jpg" alt="" draggable="false">
                        </div>
                        <h2>Kristiana Zasiadko</h2>
                        <span>Bank Manager</span>
                    </li>
                    <li class="card">
                        <div class="img"><img src="assets/images/Member images/img-6.jpg" alt="" draggable="false">
                        </div>
                        <h2>Donald Horton</h2>
                        <span>App Designer</span>
                    </li>
                </ul>
                <i id="right" class="fa fa-arrow-right" aria-hidden="true"></i>
            </div>

        </section>
    </div>
    <!-- Family Member End -->


    <!-- Contact Us Start -->

    <section class="contact" id="contact">
        <div class="con">
            <h2>Contact Us</h2>
            <p>Reach out to us for any inquiries or feedback.</p>
            <div class="row">
                <div class="col information">
                    <div class="contact-details">
                        <p><i class="fas fa-map-marker-alt"></i> 123 Campsite Avenue, Wilderness, CA 98765</p>
                        <p><i class="fas fa-envelope"></i> info@campinggearexperts.com</p>
                        <p><i class="fas fa-phone"></i> (123) 456-7890</p>
                        <p><i class="fas fa-clock"></i> Monday - Friday: 9:00 AM - 5:00 PM</p>
                        <p><i class="fas fa-clock"></i> Saturday: 10:00 AM - 3:00 PM</p>
                        <p><i class="fas fa-clock"></i> Sunday: Closed</p>
                        <p><i class="fas fa-globe"></i> www.codingnepalweb.com</p>
                    </div>
                </div>
                <div class="col form">
                    <form>
                        <input type="text" placeholder="Name*" required>
                        <input type="email" placeholder="Email*" required>
                        <textarea placeholder="Message*" required></textarea>
                        <button id="submit" type="submit">Send Message</button>
                    </form>
                </div>
            </div>
        </div>


    </section>


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






    <script src="assets/js/header.js"></script>
    <script src="assets/js/member.js"></script>

</body>




</html>
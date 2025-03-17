<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="icon" type="image/png" href="./assets/images/images.png">
    <!-- ________________CSS________________ -->
    <link rel="stylesheet" href="assets/css/homePage.css">

    <!-- ________________Boxicons________________ -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!-- ________________Family Members CSS________________ -->
    <link rel="stylesheet" href="assets/css/memberSlider.css">

    <!-- ________________Font Awesome icons________________ -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <!-- ________________Footer CSS________________ -->
    <link rel="stylesheet" href="assets/css/footer.css">

    <link rel="stylesheet" href="./assets/css/gallery.css">

    <link rel="stylesheet" href="./assets/css/lightbox.min.css">
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
    
    <div class="header">
        Gallery Page
    </div>


    <section class="portfolio" id="Portfolio">
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
                            <a href="./adminPanel/assets/imagesLibrary/<?php echo $gallery_row['image']?>" data-lightbox="mygallery"><img src="./adminPanel/assets/imagesLibrary/<?php echo $gallery_row['image']?>" alt="portfolio"></a>
                           
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





    


    <script src="./assets/js/galley.js"></script>

    <script src="./assets/js/header.js"></script>

    <script src="./assets/js/lightbox-plus-jquery.min.js"></script>
</body>
</html>
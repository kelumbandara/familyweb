<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="./assets/images/images.png">
    <title>Skynet</title>
    <link rel="stylesheet" href="./assets/css/memberSlider.css">
    <!-- Linking Google Fonts for Icons -->
<!-- Google Fonts -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,200,0,0" />

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-HHsOC+h3najWR7OKiGZtfhFIEzg5VRIPde0kB0bG2QRidTQqf+sbfcxCTB16AcFB93xMjnBIKE29/MjdzXE+qw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<!-- Boxicons -->
<link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css">

<!-- Swiper CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">

<!-- Internal CSS -->
<link rel="stylesheet" href="./assets/css/homePage.css">


<link rel="stylesheet" href="./assets/css/lightbox.min.css">
<link rel="stylesheet" href="./assets/css/footer.css">
<link rel="stylesheet" href="./assets/css/gallery.css">
<link rel="stylesheet" href="./assets/css/blog_detail.css">
<link rel="stylesheet" href="assets/css/vision_mision.css">


<!-- Favicon -->
<link rel="icon" type="image/png" href="./assets/images/images.png">



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
                    <li><a href="index.php">මූල පිටුව</a></li>
                    <li><a href="#">පවුල් රාමුව</a></li>
                    <li><a href="blog.php"> පුවත් සහ යාවත්කාලීන</a></li>
                    <li><a href="gallery.php">ගැලරිය</a></li>
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
    <!-- Header End -->
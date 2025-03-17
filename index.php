<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="./assets/images/images.png">
    <title>Skynet</title>
    <!-- Linking Google Fonts for Icons -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,200,0,0" />
   <!-- External CSS -->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
   <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css">
   
   <!-- Internal CSS -->
   <link rel="stylesheet" href="./assets/css/homePage.css">
   <link rel="stylesheet" href="./assets/css/memberSlider.css">
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
    <!-- Header End -->

    <!-- Hero Section Start -->
    <div class="slider-container">
        <!-- Slider List Items -->


        <div class="slider-wrapper swiper-wrapper">
    <?php
    $con = mysqli_connect("localhost", "root", "", "family_tree");
    if (!$con) {
        die("Connection Failed: " . mysqli_connect_error());
    }

    $sql = "SELECT * FROM blogs ORDER BY date DESC LIMIT 5";
    $result = mysqli_query($con, $sql);
    while ($row = mysqli_fetch_assoc($result)) { ?>
        <div class="slider-item swiper-slide"
            style="background: url('./adminPanel/assets/blogImages/blogTitle/<?php echo $row['image']; ?>'); filter: grayscale(20%) !important; background-repeat: no-repeat; background-position: center; background-size: cover;">
            <div class="slide-content">
                <h3 class="slide-subtitle">
                    <?php echo $row['Author']; ?>
                </h3>
                <h2 class="slide-title">
                    <?php echo $row['heading']; ?>!
                </h2>
                <p class="slide-description">
                    <?php  
                    $content = $row['content'];
                    $contentArray = explode(' ', $content);
                    echo (count($contentArray) > 25) 
                        ? implode(' ', array_slice($contentArray, 0, 20)) . '...' 
                        : $content;
                    ?>
                </p>
                <a href="./blog_detail.php?blog_id=<?php echo $row['id']; ?>" class="slide-button"><span>Learn More</span></a>
            </div>
        </div>
    <?php
    }
    ?>
</div>


        <!-- Slider Pagination -->
        <div class="slider-controls">
            <ul class="slider-pagination">
                <?php
    $con=mysqli_connect("localhost","root","","family_tree");
    if(!$con){
      die("Connection Faild".mysqli_connect());
    };
    
      $sql="SELECT * FROM blogs ORDER BY date DESC LIMIT 5";
      $result=mysqli_query($con,$sql);
      while($row=mysqli_fetch_assoc($result)){?>
                <div class="slider-indicator"></div>
                <li class="slider-tab current">
                    <?php echo $row['heading']?>
                </li>

                <?php
      }
      ?>


            </ul>
        </div>

        <!-- Slider Navigations (Prev/Next) -->
        <div class="slider-navigations">
            <button id="slide-prev" class="material-symbols-rounded">arrow_left_alt</button>
            <button id="slide-next" class="material-symbols-rounded">arrow_right_alt</button>
        </div>
    </div>

    <!-- Hero Section End -->

   


    <!-- About Us Start -->
    <section class="about">
        <div class="container">
            <div class="section_title">
                <h2>Antecedent</h2>
                <p>අප පවුලේ සාමජිකයන් ලෙස පවුල තුළ සමගිය, සනිවේදනය සහ බෙදා හාදා ගැනීමේ වැදගත්කම හදුනා ගනිමින් අපගේ පවුල් සංවිධානයේ සහ ජීවනය වර්ධනය කිරීම සදහා මෙම ව්‍යවස්ථාව ස්ථාපිත කරමු</p>
            </div>
            <div class="row family_info">
                <div class="left">
                    <h3>අපේ පවුලේ මෙහෙවර</h3>
                    <p>පවුලේ බැදීම් ශක්තිමත් කිරීම, සන්නිවේදනය ප්‍රවර්ධනය කිරීම සහ එහි සාමාජිකයින්ගේ ජිවිත අර්ථවත් කරන ක්‍රියාකාරකම් සංවිධානය කිරීම.</p>
                </div>

                <div class="right">
                    <h3>අපේ පවුලේ දැක්ම</h3>
                    <p>පවුලේ සෑම සාමාජිකයෙකුටම වටිනාකමක්, සබඳතාවයක් සහ දියුණු වීමට ශකිතියක් දැනෙන අධිශ්ඨානශිලි හා අනොන්‍ය සහයක පරිසරයක් නිර්මනය කිරීම.</p>
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
                        <div class="img"><img src="assets/images/Member images/img-1.jpg" alt="" draggable="false"></div>
                        <h2>Balance Pearson</h2>
                        <span>Sales Manager</span>
                    </li>
                    <li class="card">
                        <div class="img"><img src="assets/images/Member images/img-2.jpg" alt="" draggable="false"></div>
                        <h2>Joenas Brauers</h2>
                        <span>Web Developer</span>
                    </li>
                    <li class="card">
                        <div class="img"><img src="assets/images/Member images/img-3.jpg" alt="" draggable="false"></div>
                        <h2>Lariach French</h2>
                        <span>Online Teacher</span>
                    </li>
                    <li class="card">
                        <div class="img"><img src="assets/images/Member images/img-4.jpg" alt="" draggable="false"></div>
                        <h2>James Khosravi</h2>
                        <span>Freelancer</span>
                    </li>
                    <li class="card">
                        <div class="img"><img src="assets/images/Member images/img-5.jpg" alt="" draggable="false"></div>
                        <h2>Kristiana Zasiadko</h2>
                        <span>Bank Manager</span>
                    </li>
                    <li class="card">
                        <div class="img"><img src="assets/images/Member images/img-6.jpg" alt="" draggable="false"></div>
                        <h2>Donald Horton</h2>
                        <span>App Designer</span>
                    </li>
                </ul>
                <i id="right" class="fa fa-arrow-right" aria-hidden="true"></i>
            </div>
        </section>
    </div>
    
    <!-- Family Member End -->
    <style>
      
        </style>
        
        
        <section id="family-constitution">
            <h2>Our Family Constitution</h2>
            <p>
            අපගේ පවුල් ව්‍යවස්ථාව මගින් අපගේ ක්‍රියාවන්, තීරණ සහ අපගේ පවුල තුළ සබඳතා මෙහෙයවන මූලික වටිනාකම් සහ මූලධර්ම දක්වා ඇත.<br>
              <span><strong>Our Guiding Principle:</strong> "අපි එක්ව තීරණ ගනිමු, සෑම හඬකටම ගරු කරමු, සහ අපගේ එදිනෙදා ජීවිතයේදී මෙම මූලධර්මවලට ගරු කරමු."</span>
            </p>
        
            <div class="values">
              <div class="value-card">
                <div class="icon">🤝</div>
                <h3>ගරු කරනවා</h3>
              </div>
              <div class="value-card">
                <div class="icon">🛡️</div>
                <h3>අඛණ්ඩතාවය</h3>
              </div>
              <div class="value-card">
                <div class="icon">💪</div>
                <h3>එකමුතුකම</h3>
              </div>
              <div class="value-card responsibility-card">
                <div class="icon">⚖️</div>
                <h3>වගකීම</h3>
              </div>
            </div>
        </section>
        
  
  
  
      



    <section class="portfolio" id="Portfolio">
        <h1>Our Image Gallery</h1>
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
                $gallery_sql="SELECT * FROM image_gallery LIMIT 5";
                $gallery_result=mysqli_query($con,$gallery_sql);
                if($gallery_result){
                    while($gallery_row=mysqli_fetch_assoc($gallery_result)){
                        ?>
                    <div class="item" data-id="<?php echo $gallery_row['category']?>">
                        <div class="inner">
                            <a href="./adminPanel/assets/imagesLibrary/<?php echo $gallery_row['image']?>"
                                data-lightbox="mygallery"><img
                                    src="./adminPanel/assets/imagesLibrary/<?php echo $gallery_row['image']?>"
                                    alt="portfolio"></a>

                        </div>
                    </div>
                    <?php
                    }
                }

                ?>





                </div>
                <a href="./gallery.php" class="image_link ">More Images</a>
            </div>
        </div>
    </section>

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
    <script src="assets/js/script.js"></script>
    <script src="assets/js/swiper-bundle.min.js"></script>
    <script src="./assets/js/galley.js"></script>
    <script src="./assets/js/lightbox-plus-jquery.min.js"></script>

    <script>
        // Swiper instance for the main slide container
        var swiper1 = new Swiper(".slide-container", {
          slidesPerView: 4,
          spaceBetween: 20,
          slidesPerGroup: 1, // Smooth looping
          loop: true,
          centerSlide: "true",
          grabCursor: "true",
          autoplay: {
            delay: 3000,
            disableOnInteraction: false, // Continue autoplay after interaction
          },
          pagination: {
            el: ".swiper-pagination",
            clickable: true,
            dynamicBullets: true,
          },
          navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
          },
          breakpoints: {
            0: {
              slidesPerView: 1,
            },
            520: {
              slidesPerView: 2,
            },
            768: {
              slidesPerView: 3,
            },
            1000: {
              slidesPerView: 4,
            },
          },
        });
      </script>
      
      <script>
        // Swiper instance for slider with tabs and indicator
        var swiper2 = new Swiper(".slider-container", {
          effect: "fade",
          speed: 1300,
          autoplay: { delay: 10000 },
          navigation: {
            prevEl: "#slide-prev",
            nextEl: "#slide-next",
          },
          on: {
            slideChange: () => {
              updateIndicator(swiper2.activeIndex);
            },
            reachEnd: () => swiper2.autoplay.stop(),
          },
        });
      
        const sliderControls = document.querySelector(".slider-controls");
        const sliderTabs = sliderControls.querySelectorAll(".slider-tab");
        const sliderIndicator = sliderControls.querySelector(".slider-indicator");
      
        // Function to update the active tab and indicator
        function updateIndicator(index) {
          const activeTab = sliderTabs[index];
      
          document.querySelector(".slider-tab.current")?.classList.remove("current");
          activeTab.classList.add("current");
      
          sliderIndicator.style.transform = `translateX(${activeTab.offsetLeft - 20}px)`;
          sliderIndicator.style.width = `${activeTab.getBoundingClientRect().width}px`;
      
          // Scroll the tab list smoothly
          const scrollLeft = activeTab.offsetLeft - sliderControls.offsetWidth / 2 + activeTab.offsetWidth / 2;
          sliderControls.scrollTo({ left: scrollLeft, behavior: "smooth" });
        }
      
        // Add click event to tabs
        sliderTabs.forEach((tab, index) => {
          tab.addEventListener("click", () => {
            swiper2.slideTo(index);
            updateIndicator(index);
          });
        });
      
        // Initialize the indicator position
        updateIndicator(0);
      
        // Update on window resize
        window.addEventListener("resize", () => updateIndicator(swiper2.activeIndex));
      </script>
      

    <!-- Linking Swiper Script -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>



</body>




</html>
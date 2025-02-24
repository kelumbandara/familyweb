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

    <title>Home - Darisset</title>


    <!-- ________________Font Awesome icons________________ -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <!-- ________________Footer CSS________________ -->
    <link rel="stylesheet" href="./assets/css/homePage.css">

    <!-- ________________Boxicons________________ -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>


    <?php
    session_start();
     if(isset($_SESSION['UsName'])){
        ?>


    <!-- Header Start -->
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
                <!-- <div class="login_button">
                    <a href="loginPage.php"><i class='bx bx-log-in'></i>Login</a>
                </div> -->

                <div class="profile_button">
                    <a href="Profile.php?id='<?php echo $_SESSION['UsName'] ?>'"><img
                            src="assets/images/Member images/img-1.jpg" alt="">
                        <?php echo $_SESSION['UsName'] ?>
                    </a>
                </div>
            </div>

        </div>
    </nav>
    <!-- Header End -->

    <?php
     }else{
        ?>
    <!-- Header Start -->
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
                    <a href="loginPage.php"><i class='bx bx-log-in'></i>Login</a>
                </div>

                <!-- <div class="profile_button">
                    <a href="Profile.php"><img src="assets/images/Member images/img-2.jpg" alt="">Hello</a>
                </div> -->
            </div>

        </div>
    </nav>
    <!-- Header End -->
    <?php
     }
     ?>



    <!-- popular post -->
    <div class="popular-post">
        <div class="container">
            <!-- popular post -->
            <section class="section projects">
                <!-- section title -->
                <div class="section-title">
                    <h2>Blog page</h2>
                    <div class="underline"></div>
                </div>
                <!-- end of section title -->
                <div class="section-center projects-center">
                    <!-- single post -->
                    <a href="detail.html" class="project-1">
                        <article class="project">
                            <img src="./image/img/blog1.jpg" alt="" class="project-img" />
                            <div class="project-info">
                                <h4>How to learning python?</h4>
                                <p>Python</p>
                            </div>
                        </article>
                    </a>
                    <!-- end of single post -->
                    <!-- single post -->
                    <a href="detail.html" class="project-2">
                        <article class="project">
                            <img src="./image/img/blog2.jpg" alt="" class="project-img" />
                            <div class="project-info">
                                <h4>Nothing is impossible</h4>
                                <p>Journal</p>
                            </div>
                        </article>
                    </a>
                    <!-- end of single post -->
                    <!-- single post -->
                    <a href="detail.html" class="project-3">
                        <article class="project">
                            <img src="./image/img/slide1.jpg" alt="" class="project-img" />
                            <div class="project-info">
                                <h4>Lorem ipsum dolor sit.</h4>
                                <p>Life Style</p>
                            </div>
                        </article>
                    </a>
                    <!-- end of single project -->
                    <!-- single project -->
                    <a href="detail.html" class="project-4">
                        <article class="project">
                            <img src="./image/img/blog3.jpg" alt="" class="project-img" />
                            <div class="project-info">
                                <h4>Lorem ipsum dolor sit.</h4>
                                <p>Education</p>
                            </div>
                        </article>
                    </a>
                    <!-- end of single project -->
                </div>
            </section>
            <!-- endo of projects -->
        </div>
    </div>
    <!-- popular post -->

    <!-- Banner -->
    <div class="banner">
        <div class="container">
            <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <section>
                            <div class="section-center clearfix">
                                <!-- banner-img -->
                                <article class="banner-img">
                                    <div class="banner-picture-container">
                                        <img src="./image/img/slide1.jpg" alt="tea kettle" class="banner-picture" />
                                    </div>
                                </article>
                                <!-- banner-info -->
                                <article class="banner-info">
                                    <!-- section title -->
                                    <div class="">
                                        <h3>Banner our ?</h3>
                                        <h2>My Journal</h2>
                                    </div>
                                    <!-- end of section title -->
                                    <p class="banner-text">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi
                                        repellendus reprehenderit iure, vero nobis dolore!
                                    </p>
                                    <p class="banner-text">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi
                                        repellendus reprehenderit iure, vero nobis dolore!
                                    </p>
                                    <a href="detail.html" class="btn">learn more</a>
                                </article>
                            </div>
                        </section>
                    </div>
                    <div class="carousel-item">
                        <section>
                            <div class="section-center clearfix">
                                <!-- banner-img -->
                                <article class="banner-img">
                                    <div class="banner-picture-container">
                                        <img src="./image/img/slide2.jpg" alt="tea kettle" class="banner-picture" />
                                    </div>
                                </article>
                                <!-- banner-info -->
                                <article class="banner-info">
                                    <!-- section title -->
                                    <div class="">
                                        <h3>Haw learn python?</h3>
                                        <h2>Pyhton Beginners</h2>
                                    </div>
                                    <!-- end of section title -->
                                    <p class="banner-text">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi
                                        repellendus reprehenderit iure, vero nobis dolore!
                                    </p>
                                    <p class="banner-text">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi
                                        repellendus reprehenderit iure, vero nobis dolore!
                                    </p>
                                    <a href="detail.html" class="btn">learn more</a>
                                </article>
                            </div>
                        </section>
                    </div>
                    <div class="carousel-item">
                        <section>
                            <div class="section-center clearfix">
                                <!-- banner-img -->
                                <article class="banner-img">
                                    <div class="banner-picture-container">
                                        <img src="./image/img/slide3.jpg" alt="tea kettle" class="banner-picture" />
                                    </div>
                                </article>
                                <!-- banner-info -->
                                <article class="banner-info">
                                    <!-- section title -->
                                    <div class="">
                                        <h3>What happened..?</h3>
                                        <h2>Django </h2>
                                    </div>
                                    <!-- end of section title -->
                                    <p class="banner-text">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi
                                        repellendus reprehenderit iure, vero nobis dolore!
                                    </p>
                                    <p class="banner-text">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi
                                        repellendus reprehenderit iure, vero nobis dolore!
                                    </p>
                                    <a href="detail.html" class="btn">learn more</a>
                                </article>
                            </div>
                        </section>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
    <!-- end banner -->


    <!-- Categori list -->
    <div class="categori-list">
        <div class="container">
            <section class="section bg-grey">
                <div class="section-title mt-5">
                    <h2>Categories</h2>
                    <div class="underline"></div>
                </div>
                <div class="section-center services-center">
                    <!-- single  service category-->
                    <article class="service">
                        <a href="category.html">
                            <i class="fas fa-journal-whills ser-icon"></i>
                            <h4>Joural</h4>
                            <div class="underline"></div>
                            <p>
                                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Similique
                                at repellendus eius omnis asperiores laborum reprehenderit quis
                                pariatur quidem placeat.
                            </p>
                        </a>
                    </article>
                    <!-- end of single service category -->
                    <!-- single  service category -->
                    <article class="service">
                        <a href="category.html">
                            <!-- fa -->
                            <i class="fa fa-heart ser-icon" aria-hidden="true"></i>
                            <h4>Life Style</h4>
                            <div class="underline"></div>
                            <p>
                                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Similique
                                at repellendus eius omnis asperiores laborum reprehenderit quis
                                pariatur quidem placeat.
                            </p>
                        </a>
                    </article>
                    <!-- end of single service category -->
                    <!-- single  service category -->
                    <article class="service">
                        <a href="category.html">
                            <!-- fab -->
                            <i class="fa fa-graduation-cap ser-icon"></i>
                            <h4> Education</h4>
                            <div class="underline"></div>
                            <p>
                                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Similique
                                at repellendus eius omnis asperiores laborum reprehenderit quis
                                pariatur quidem placeat.
                            </p>
                        </a>
                    </article>
                    <!-- end of single service category -->
                </div>


            </section>
            <!-- end of services category -->
        </div>
    </div>
    <!-- end categori list -->

    <!-- Blog -->
    <div class="blog">
        <div class="container ">
            <div class="row">
                <div class="section-title mt-5">
                    <h2>All Post</h2>
                    <div class="underline"></div>
                </div>
                <div class=" mb-5">
                    <!-- featured blogs -->
                    <section class="section" id="featured">
                        <!-- featured-center -->
                        <div class="section-center featured-center ">
                            <div class="row justify-content-start">
                                <div class="col-lg-6">
                                    <!-- single blog -->
                                    <article class="blog-card">
                                        <div class="blog-img-container">
                                            <a href="#"><img src="./image/img/blog1.jpg" class="blog-img" alt="" /></a>
                                            <p class="blog-date">august 26th, 2020</p>
                                        </div>
                                        <!-- blog info -->
                                        <div class="blog-info">
                                            <div class="blog-title">
                                                <a href="detail.html">
                                                    <h4>Tibet Adventure Lorem ipsum dolor</h4>
                                                </a>
                                                <a href="category.html">
                                                    <p>Education</p>
                                                </a>
                                            </div>
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque
                                                vitae tempore voluptatum maxime reprehenderit eum quod
                                                exercitationem fugit, qui corporis.
                                            </p>
                                            <!-- blog footer -->
                                            <div class="blog-footer">
                                                <a href="">
                                                    <p>
                                                        <span><i class="fas fa-user"></i></span> Darisset
                                                    </p>
                                                </a>
                                                <a href="detail.html">
                                                    <p>Read More...</p>
                                                </a>
                                            </div>
                                        </div>
                                    </article>
                                    <!-- end of single blog -->
                                </div>
                                <div class="col-lg-6">
                                    <!-- single blog -->
                                    <article class="blog-card">
                                        <div class="blog-img-container">
                                            <a href="#"><img src="./image/img/blog2.jpg" class="blog-img" alt="" /></a>
                                            <p class="blog-date">august 26th, 2020</p>
                                        </div>
                                        <!-- blog info -->
                                        <div class="blog-info">
                                            <div class="blog-title">
                                                <a href="detail.html">
                                                    <h4>Tibet Adventure</h4>
                                                </a>
                                                <a href="category.html">
                                                    <p>Life Style</p>
                                                </a>
                                            </div>
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque
                                                vitae tempore voluptatum maxime reprehenderit eum quod
                                                exercitationem fugit, qui corporis.
                                            </p>
                                            <!-- blog footer -->
                                            <div class="blog-footer">
                                                <a href="">
                                                    <p>
                                                        <span><i class="fas fa-user"></i></span> Darisset
                                                    </p>
                                                </a>
                                                <a href="detail.html">
                                                    <p>Read More...</p>
                                                </a>
                                            </div>
                                        </div>
                                    </article>
                                    <!-- end of single blog -->
                                </div>
                                <div class="col-lg-6">
                                    <!-- single blog -->
                                    <article class="blog-card">
                                        <div class="blog-img-container">
                                            <a href="#"><img src="./image/img/blog3.jpg" class="blog-img" alt="" /></a>
                                            <p class="blog-date">august 26th, 2020</p>
                                        </div>
                                        <!-- blog info -->
                                        <div class="blog-info">
                                            <div class="blog-title">
                                                <a href="detail.html">
                                                    <h4>Tibet Adventure</h4>
                                                </a>
                                                <a href="category.html">
                                                    <p>Journal</p>
                                                </a>
                                            </div>
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque
                                                vitae tempore voluptatum maxime reprehenderit eum quod
                                                exercitationem fugit, qui corporis.
                                            </p>
                                            <!-- blog footer -->
                                            <div class="blog-footer">
                                                <a href="">
                                                    <p>
                                                        <span><i class="fas fa-user"></i></span> Darisset
                                                    </p>
                                                </a>
                                                <a href="detail.html">
                                                    <p>Read More...</p>
                                                </a>
                                            </div>
                                        </div>
                                    </article>
                                    <!-- end of single blog -->
                                </div>
                                <div class="col-lg-6">
                                    <!-- single blog -->
                                    <article class="blog-card">
                                        <div class="blog-img-container">
                                            <a href="#"><img src="./image/img/blog3.jpg" class="blog-img" alt="" /></a>
                                            <p class="blog-date">august 26th, 2020</p>
                                        </div>
                                        <!-- blog info -->
                                        <div class="blog-info">
                                            <div class="blog-title">
                                                <a href="detail.html">
                                                    <h4>Tibet Adventure</h4>
                                                </a>
                                                <a href="category.html">
                                                    <p>Journal</p>
                                                </a>
                                            </div>
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque
                                                vitae tempore voluptatum maxime reprehenderit eum quod
                                                exercitationem fugit, qui corporis.
                                            </p>
                                            <!-- blog footer -->
                                            <div class="blog-footer">
                                                <a href="">
                                                    <p>
                                                        <span><i class="fas fa-user"></i></span> Darisset
                                                    </p>
                                                </a>
                                                <a href="detail.html">
                                                    <p>Read More...</p>
                                                </a>
                                            </div>
                                        </div>
                                    </article>
                                    <!-- end of single blog -->
                                </div>

                            </div>
                        </div>
                        <!-- end of blogs center -->
                        <div class="blog-btn mt-5">
                            <a href="blog.html" class="btn">all post</a>
                        </div>
                    </section>
                    <!-- end of featured blogs -->
                </div>
            </div>
        </div>
    </div>
    <!-- end blog -->

    <div class="container mb-5">
        <div class="section-title mt-5">
            <h2>Recent Posts</h2>
            <div class="underline"></div>
        </div>
        <section class="section" id="featured">
            <!-- featured-center -->
            <div class="section-center featured-center ">
                <div class="row justify-content-start">
                    <div class="col-lg-6">
                        <!-- single blog -->
                        <article class="blog-card">
                            <!-- blog info -->
                            <div class="blog-info">
                                <div class="blog-title">
                                    <a href="detail.html">
                                        <h4>Tibet Lorem ?</h4>
                                    </a>
                                    <a href="category.html">
                                        <p>Education</p>
                                    </a>
                                </div>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque
                                    vitae tempore voluptatum maxime reprehenderit eum quod
                                    exercitationem fugit, qui corporis.
                                </p>
                                <!-- blog footer -->
                                <div class="blog-footer">
                                    <a href="">
                                        <p>
                                            <span><i class="fas fa-user"></i></span> Darisset
                                        </p>
                                    </a>
                                    <a href="detail.html">
                                        <p>Read More...</p>
                                    </a>
                                </div>
                            </div>
                        </article>
                        <!-- end of single blog -->
                    </div>
                    <div class="col-lg-6">
                        <!-- single blog -->
                        <article class="blog-card">
                            <!-- blog info -->
                            <div class="blog-info">
                                <div class="blog-title">
                                    <a href="detail.html">
                                        <h4>Tibet Adventure</h4>
                                    </a>
                                    <a href="category.html">
                                        <p>Life Style</p>
                                    </a>
                                </div>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque
                                    vitae tempore voluptatum maxime reprehenderit eum quod
                                    exercitationem fugit, qui corporis.
                                </p>
                                <!-- blog footer -->
                                <div class="blog-footer">
                                    <a href="">
                                        <p>
                                            <span><i class="fas fa-user"></i></span> Darisset
                                        </p>
                                    </a>
                                    <a href="detail.html">
                                        <p>Read More...</p>
                                    </a>
                                </div>
                            </div>
                        </article>
                        <!-- end of single blog -->
                    </div>
                    <div class="col-lg-6">
                        <!-- single blog -->
                        <article class="blog-card">
                            <!-- blog info -->
                            <div class="blog-info">
                                <div class="blog-title">
                                    <a href="detail.html">
                                        <h4>Tibet Adventure</h4>
                                    </a>
                                    <a href="category.html">
                                        <p>Journal</p>
                                    </a>
                                </div>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque
                                    vitae tempore voluptatum maxime reprehenderit eum quod
                                    exercitationem fugit, qui corporis.
                                </p>
                                <!-- blog footer -->
                                <div class="blog-footer">
                                    <a href="">
                                        <p>
                                            <span><i class="fas fa-user"></i></span> Darisset
                                        </p>
                                    </a>
                                    <a href="detail.html">
                                        <p>Read More...</p>
                                    </a>
                                </div>
                            </div>
                        </article>
                        <!-- end of single blog detail-->
                    </div>
                    <div class="col-lg-6">
                        <!-- single blog -->
                        <article class="blog-card">
                            <!-- blog detail info -->
                            <div class="blog-info">
                                <div class="blog-title">
                                    <a href="detail.html">
                                        <h4>Tibet Adventure</h4>
                                    </a>
                                    <a href="category.html">
                                        <p>Journal</p>
                                    </a>
                                </div>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque
                                    vitae tempore voluptatum maxime reprehenderit eum quod
                                    exercitationem fugit, qui corporis.
                                </p>
                                <!-- detail footer -->
                                <div class="blog-footer">
                                    <a href="">
                                        <p>
                                            <span><i class="fas fa-user"></i></span> Darisset
                                        </p>
                                    </a>
                                    <a href="detail.html">
                                        <p>Read More...</p>
                                    </a>
                                </div>
                            </div>
                        </article>
                        <!-- end of single detail -->
                    </div>

                </div>
            </div>
        </section>
    </div>


    <!-- newsletter -->
    <section class="section newsletter" id="newsletter">
        <div class="container section-center newsletter-center">
            <div class="newsletter-title">
                <h3>want latest post info and updates?</h3>
                <p>Sign up for newsletter and stay up to date</p>
            </div>
            <form class="newsletter-form">
                <input type="email" class="form-control" placeholder="your email" />
                <button type="submit" class="btn-submit">submit</button>
            </form>
        </div>
    </section>
    <!-- end of newsletter -->

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
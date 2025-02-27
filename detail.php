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

    <!-- Blog -->
    <div class="mt-5" style="margin-top: 105px !important;">
        <div class="container ">
            <div class="row">
                <div class="col-lg-8 mb-5">
                    <!-- featured Details -->
                    <section class="section" id="featured">
                        <div class="detail">
                            <img src="./image/img/slide2.jpg" class="img-fluid" alt="...">
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
                                <h1>How Install Django On Ubuntu?</h1>
                                <p class="mt-3">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptate
                                    cumque eveniet deleniti incidunt assumenda? Recusandae sunt molestias repudiandae.
                                    Labore dolorem odit corporis. Error quae iusto, odit facere neque, eum ipsam
                                    molestias adipisci fugiat in quaerat aut aspernatur laboriosam. Ad nesciunt quaerat
                                    cum veritatis quidem delectus voluptatum molestias, enim labore, voluptatibus odio
                                    tenetur necessitatibus, modi facere reprehenderit doloribus consequatur omnis
                                    corrupti officia. Magnam quas dolorem laboriosam possimus odit eaque, praesentium
                                    ullam necessitatibus consequatur laudantium vitae aspernatur.</p>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim totam vel molestias,
                                    illo rerum voluptate beatae aspernatur eum dolores laborum nihil autem a ducimus
                                    eveniet veritatis? Quibusdam asperiores id illo veniam? Voluptate rem reprehenderit
                                    corporis!</p>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur quisquam saepe
                                    distinctio. Accusantium, doloremque explicabo maxime dolorum repellendus nulla
                                    suscipit laudantium! Atque velit, at distinctio mollitia deserunt magnam quisquam
                                    consectetur a blanditiis rem nam illo hic, iste pariatur quasi recusandae
                                    repellendus ab quas ut dolorem odit animi natus. Error, facilis.</p>

                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Est ut vero corrupti
                                    incidunt odit iusto neque, laboriosam suscipit sint blanditiis, illum quo itaque
                                    nemo aliquid ad laudantium! Quae, nobis illo?</p>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi iste quae aspernatur
                                    quibusdam, beatae praesentium, veritatis nemo incidunt esse eos minus dolorum
                                    deserunt ab! A dolorum maiores praesentium doloremque saepe, sit natus eligendi,
                                    inventore tempore illo ratione debitis non impedit dignissimos fuga aperiam! Minima
                                    obcaecati tempore alias eos iusto nihil!</p>


                                <figcaption class="blockquote-footer mt-5">
                                    <span>#Tags: </span>
                                    <cite title="Source Title">Python, Django, Web Development</cite>
                                </figcaption>

                            </div>
                        </div>

                        <!-- <div class="comment mt-5 p-5">
                            <h3>Get Comment!</h3>
                            <form class="mt-4" action="" method="post">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" placeholder="Full name"
                                            aria-label="Full name">
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="email" class="form-control" placeholder="Email address"
                                            aria-label="Email address">
                                    </div>
                                </div>
                                <div class="mt-3 mb-3">
                                    <textarea class="form-control" placeholder="Comment area"
                                        id="exampleFormControlTextarea1" rows="3"></textarea>
                                </div>
                                <button type="submit" class="btn">Post comment</button>
                            </form>
                        </div>

                        <div class="comment-area mt-5">
                        
                            <div class="comment_area clearfix mt-70">
                                <ul>
                             
                                    <li class="single_comment_area">
                                
                                        <div class="comment-content">
                                     
                                            <div class="comment-meta d-flex align-items-center justify-content-between">
                                                <p>
                                                    <i class="fas fa-user pr-2"></i> <a class="profile" href="#">
                                                        Darisset </a> - <span href="#" class="post-date">Sep 29, 2020 at
                                                        9:48
                                                        am</span>
                                                </p>
                                                <a href="#" class="comment-reply btn world-btn">Reply</a>
                                            </div>
                                            <p>Pick the yellow peach that looks like a sunset with its red, orange, and
                                                pink coat skin, peel it off with your teeth. Sink them into unripened...
                                            </p>
                                        </div>
                                        <ul class="children">
                                            <li class="single_comment_area">
                                          
                                                <div class="comment-content">
                                                  
                                                    <div
                                                        class="comment-meta d-flex align-items-center justify-content-between">
                                                        <p>
                                                            <i class="fas fa-user pr-2"></i> <a class="profile"
                                                                href="#">
                                                                Danang Haris </a> - <span href="#" class="post-date">Sep
                                                                29,
                                                                2020 at
                                                                9:48
                                                                am</span>
                                                        </p>
                                                        <a href="#" class="comment-reply btn world-btn">Reply</a>
                                                    </div>
                                                    <p>Pick the yellow peach that looks like a sunset with its red,
                                                        orange, and pink coat skin, peel it off with your teeth. Sink
                                                        them into unripened...</p>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>

                                
                                    <li class="single_comment_area">
                                      
                                        <div class="comment-content">
                                  
                                            <div class="comment-meta d-flex align-items-center justify-content-between">
                                                <p>
                                                    <i class="fas fa-user pr-2"></i> <a class="profile" href="#">
                                                        Sherlock Holmes </a> - <span href="#" class="post-date">Sep 29,
                                                        2020 at
                                                        9:48
                                                        am</span>
                                                </p>
                                                <a href="#" class="comment-reply btn world-btn">Reply</a>
                                            </div>
                                            <p>Pick the yellow peach that looks like a sunset with its red, orange, and
                                                pink coat skin, peel it off with your teeth. Sink them into unripened...
                                            </p>
                                        </div>
                                    </li>

                                </ul>
                            </div>
                        </div> -->
                    </section>
                  
                </div>

                <div class="col-lg-4">

                    <div class="sidebar-left">
                        <form class="d-flex">
                            <input class="form-control mr-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </form>
                    </div>

                    <article class="sidebar-left">
                        <h4 class="text-center">Popular Posts</h4>
                        <div class="underline"></div>
                        <div class="pl-3 pr-3">
                            <a href="#" aria-current="true">
                                <div class="row mb-3">
                                    <div class="col-4">
                                        <img src="./image/img/blog1.jpg" class="thumbnail" alt="...">
                                    </div>
                                    <div class="col-8 recent-post">
                                        <h5>Lorem ipsum dolor sit</h5>
                                        <span>San, 12 Jan 2020</span>
                                    </div>
                                </div>
                            </a>
                            <a href="#" aria-current="true">
                                <div class="row mb-4">
                                    <div class="col-4">
                                        <img src="./image/img/blog2.jpg" class="thumbnail" alt="...">
                                    </div>
                                    <div class="col-8 recent-post">
                                        <h5>How it is django</h5>
                                        <span>San, 22 Jan 2020</span>
                                    </div>
                                </div>
                            </a>
                            <a href="#" aria-current="true">
                                <div class="row mb-4">
                                    <div class="col-4">
                                        <img src="./image/img/blog3.jpg" class="thumbnail" alt="...">
                                    </div>
                                    <div class="col-8 recent-post">
                                        <h5>What happened..?</h5>
                                        <span>San, 14 Jan 2020</span>
                                    </div>
                                </div>
                            </a>
                            <a href="#" aria-current="true">
                                <div class="row mb-4">
                                    <div class="col-4">
                                        <img src="./image/img/blog1.jpg" class="thumbnail" alt="...">
                                    </div>
                                    <div class="col-8 recent-post">
                                        <h5>First journal for me</h5>
                                        <span>San, 10 Mei 2020</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </article>

                    <article class="sidebar-left">
                        <h4 class="text-center">Categories</h4>
                        <div class="underline"></div>
                        <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <a href="#">Cras justo odio</a>
                                <span class="badge bg-primary rounded-pill">14</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <a href="#">Dapibus ac facilisis in</a>
                                <span class="badge bg-primary rounded-pill">2</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <a href="#">Morbi leo risus</a>
                                <span class="badge bg-primary rounded-pill">1</span>
                            </li>
                        </ul>
                    </article>
                </div>

            </div>
        </div>
    </div>
    <!-- end blog -->


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
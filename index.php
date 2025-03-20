<?php include("header.php")?>

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
            style="background: url('./adminPanel/assets/blogImages/blogTitle/<?php echo $row['image']; ?>'); !important; background-repeat: no-repeat; background-position: center; background-size: cover;">
            <div class="overlay"></div>
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
                <a href="./blog_detail.php?blog_id=<?php echo $row['id']; ?>" class="slide-button"><h3>තවත් හදාරන්න</h3></a>
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
    <section class="about_us_body">
    <div class="vision_mission_sec">
        <div class="left">
            <div class="text-box">
                <h2>අපි ගැන</h2>
            </div>
            
            <div class="text-box">
                <span class="Vision"><i class='bx bxs-binoculars'></i></span>
                <div>
                    <h3>පූර්වගාමී</h3>
                    <p>අප පවුලේ සාමජිකයන් ලෙස පවුල තුළ සමගිය, සනිවේදනය සහ බෙදා හාදා ගැනීමේ වැදගත්කම හදුනා ගනිමින් අපගේ පවුල් සංවිධානයේ සහ ජීවනය වර්ධනය කිරීම සදහා මෙම ව්‍යවස්ථාව ස්ථාපිත කරමු</p>
                </div>
            </div>
            <div class="text-box">
                <span class="Mission"><i class='bx bxs-flag-alt'></i></span>
                <div>
                <h3>අපේ පවුලේ මෙහෙවර</h3>
                    <p>පවුලේ බැදීම් ශක්තිමත් කිරීම, සන්නිවේදනය ප්‍රවර්ධනය කිරීම සහ එහි සාමාජිකයින්ගේ ජිවිත අර්ථවත් කරන ක්‍රියාකාරකම් සංවිධානය කිරීම.</p>
                </div>
            </div>
            <div class="text-box">
                <span class="Goals"><i class='bx bxs-crown' ></i></span>
                <div>
                    <h3>අපේ පවුලේ දැක්ම</h3>
                    <p>පවුලේ සෑම සාමාජිකයෙකුටම වටිනාකමක්, සබඳතාවයක් සහ දියුණු වීමට ශකිතියක් දැනෙන අධිශ්ඨානශිලි හා අනොන්‍ය සහයක පරිසරයක් නිර්මනය කිරීම.</p>
                </div>
            </div>
        </div>
        <div class="right"></div>
    </div>
    
</section>
    <!-- About Us End -->

   
      



    <!-- Family Members Start -->

    <div class="section_title_mem">
        <h1>අපේ සාමාජිකයන්</h1>
        <section class="Members">
            <div class="wrapper">
                <i id="left" class="bx bx-left-arrow-alt" aria-hidden="true"></i>
                <ul class="carousel">
                    <li class="card">
                        <div class="img"><img src="assets/images/Member images/pexels-howdy-30542773.jpg" alt="" draggable="false"></div>
                        <h2>Balance Pearson</h2>
                        <span>Sales Manager</span>
                    </li>
                    <li class="card">
                        <div class="img"><img src="assets/images/Member images/pexels-howdy-30542773.jpg" alt="" draggable="false"></div>
                        <h2>Joenas Brauers</h2>
                        <span>Web Developer</span>
                    </li>
                    <li class="card">
                        <div class="img"><img src="assets/images/Member images/pexels-howdy-30542773.jpg" alt="" draggable="false"></div>
                        <h2>Lariach French</h2>
                        <span>Online Teacher</span>
                    </li>
                    <li class="card">
                        <div class="img"><img src="assets/images/Member images/pexels-howdy-30542773.jpg" alt="" draggable="false"></div>
                        <h2>James Khosravi</h2>
                        <span>Freelancer</span>
                    </li>
                    <li class="card">
                        <div class="img"><img src="assets/images/Member images/pexels-howdy-30542773.jpg" alt="" draggable="false"></div>
                        <h2>Kristiana Zasiadko</h2>
                        <span>Bank Manager</span>
                    </li>
                    <li class="card">
                        <div class="img"><img src="assets/images/Member images/pexels-howdy-30542773.jpg" alt="" draggable="false"></div>
                        <h2>Donald Horton</h2>
                        <span>App Designer</span>
                    </li>
                </ul>
                <i id="right" class="bx bx-right-arrow-alt" aria-hidden="true"></i>
                
            </div>
        </section>
    </div>
    
    <!-- Family Member End -->
    <style>
      
        </style>
        
        
        <section id="family-constitution">
            <h2>අපේ පවුල් ව්‍යවස්ථාව</h2>
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
        <h1>අපගේ පින්තූර ගැලරිය</h1>
        <div class="container">

            <div class="row">
                <div class="filter-buttons">
                    <ul id="filter-btns">
                        <li class="active" data-target="all">සියලුම පින්තූර</li>
                        <li data-target="family">පවුල</li>
                        <li data-target="office">කාර්‍යාලය</li>

                    </ul>
                </div>
            </div>
            <div class="row">
            <div class="portfolio-gallery">
                    <?php
                    $gallery_sql = "SELECT * FROM image_gallery";
                    $gallery_result = mysqli_query($con, $gallery_sql);
                    if ($gallery_result) {
                        while ($gallery_row = mysqli_fetch_assoc($gallery_result)) {
                        
                            $image_name = $gallery_row['image'];

                           // Fix filenames based on known patterns
                           if (strpos($image_name, '__') !== false) {
                            // Fix 'pexels' style images
                            $image_name = str_replace('__', ' (', $image_name);
                            $image_name = str_replace('_', ')', $image_name);
                        } else {
                            // Replace underscores with spaces (for Blog_2.jpg cases)
                            $image_name = str_replace('_', ' ', $image_name);
                        }
                            ?>
                            <div class="item" data-id="<?php echo $gallery_row['category']; ?>">
                                <div class="inner">
                                    <a href="./adminPanel/assets/imagesLibrary/<?php echo $image_name; ?>" data-lightbox="mygallery">
                                        <img src="./adminPanel/assets/imagesLibrary/<?php echo $image_name; ?>" alt="portfolio">
                                    </a>
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
            <h2>අපව අමතන්න</h2>
            <p>ඕනෑම විමසීමක් හෝ ප්‍රතිපෝෂණයක් සඳහා අප හා සම්බන්ධ වන්න.</p>
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
                        <input type="text" placeholder="නම*" required>
                        <input type="email" placeholder="ඊමේල් කරන්න*" required>
                        <textarea placeholder="පණිවිඩය*" required></textarea>
                        <button id="submit" type="submit">පණිවිඩය යවන්න</button>
                    </form>
                </div>
            </div>
        </div>


    </section>

    <?php include("footer.php")?>


   
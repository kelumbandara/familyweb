<!DOCTYPE html>
<!-- Website - www.codingnepalweb.com -->
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Card Slider HTML CSS JavaScript | codingNepal</title>

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="./assets/css/swiper-bundle.min.css" />

    <!-- CSS -->
    <link rel="stylesheet" href="./assets/css/blogslider.css" />
  </head>
  <body>
    <section class="blog_slider_body ">

   
    <div class="container swiper">
      <div class="slide-container">
        <div class="card-wrapper swiper-wrapper">
<?php
$con=mysqli_connect("localhost","root","","family_tree");
if(!$con){
  die("Connection Faild".mysqli_connect());
};

  $sql="SELECT * FROM blogs";
  $result=mysqli_query($con,$sql);
  while($row=mysqli_fetch_assoc($result)){
    ?>

    <div class="card swiper-slide">
    <div class="image-box">
      <img src="./adminPanel/assets/blogImages/blogTitle/<?php echo $row['image']?>" alt="" />
    </div>
    <div class="profile-details">
      <img src="images/profile/profile1.jpg" alt="" />
      <div class="name-job">
        <h3 class="name">David Cardlos</h3>
        <h4 class="job">Full Stack Developer</h4>
      </div>
    </div>
  </div>
  <?php
  }

?>
          
          
          
        </div>
      </div>
      <div class="swiper-button-next swiper-navBtn"></div>
      <div class="swiper-button-prev swiper-navBtn"></div>
      <div class="swiper-pagination"></div>
    </div>
  </section>
    <script src="./assets/js/swiper-bundle.min.js"></script>
    <script src="./assets/js/script.js"></script>
  </body>
</html>

 <!-- Footer Start -->
 <footer>
        <section class="footer_sec">
            <div class="container">
                <div class="sec aboutus">
                    <h2>අප ගැන</h2>
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
                    <h2>ඉක්මන් සබැඳි</h2>
                    <ul>
                        <li><a href="">About</a></li>
                        <li><a href="">FAQ</a></li>
                        <li><a href="">Privacy Policy</a></li>
                        <li><a href="">Help</a></li>
                        <li><a href="">Terms & Consitions</a></li>
                    </ul>
                </div>

                <div class="sec contactInfo">
                    <h2>සම්බන්ධතා තොරතුරු</h2>
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






    <!-- JavaScript Files -->
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
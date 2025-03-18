<?php include("header.php")?>
    
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
                    $gallery_sql = "SELECT * FROM image_gallery";
                    $gallery_result = mysqli_query($con, $gallery_sql);
                    if ($gallery_result) {
                        while ($gallery_row = mysqli_fetch_assoc($gallery_result)) {
                        
                            $image_name = $gallery_row['image'];

                            $image_name = str_replace('__', ' (', $image_name);
                            $image_name = str_replace('_', ')', $image_name);
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
            </div>

        </div>
    </section>





    <?php include("footer.php")?>

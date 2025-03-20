<?php include("header.php")?>

<?php
if (!isset($_REQUEST['blog_id']) || empty($_REQUEST['blog_id'])) {
    die("Invalid blog ID.");
}

$blog_id = mysqli_real_escape_string($con, $_REQUEST['blog_id']);

$blog_single_sql = "SELECT * FROM blogs WHERE id ='$blog_id'";
$single_result = mysqli_query($con, $blog_single_sql);

if (!$single_result) {
    die("Query failed: " . mysqli_error($con));
}

if ($single_row = mysqli_fetch_assoc($single_result)) {
    $current_views = (int) $single_row['views'];  
    $new_views = $current_views + 1;

    $update_views_sql = "UPDATE blogs SET views = '$new_views' WHERE id = '$blog_id'";
    mysqli_query($con, $update_views_sql);

    $blog_image = $single_row['image']; 
?>
    <div class="header"
    style="background: linear-gradient(to bottom, rgba(0,0,0,0.5) 0%, rgba(0,0,0,.5) 100%), url('./adminPanel/assets/blogImages/blogTitle/<?php echo $blog_image; ?>');">
    </div>

    <section class="body">
        <div class="blog_items">
            <div class="title">
                <a href="#" class="blog_title">
                    <h3><?php echo htmlspecialchars($single_row['heading']); ?></h3>
                </a>
                <div class="blog_author">
                    <h4><?php echo htmlspecialchars($single_row['Author']); ?></h4>
                </div>
            </div>

            <div class="content">
                <?php
                $paragraphs = preg_split('/(?<!\w\.\w.)(?<![A-Z][a-z]\.)(?<=\.|\?|\!)\s/', $single_row['content']);
                foreach ($paragraphs as $paragraph) {
                    if (!empty(trim($paragraph))) {
                        echo '<p>' . htmlspecialchars(trim($paragraph)) . '</p>';
                    }
                }
                ?>
            </div>

            <div class="image_section">
                <div class="gallery">
                    <?php
                    $blog_gallery_img = $single_row['id'];
                    $blog_gallery_single_sql = "SELECT * FROM blog_images WHERE blog_id='$blog_gallery_img'";
                    $Blog_images_result = mysqli_query($con, $blog_gallery_single_sql);

                    if (!$Blog_images_result) {
                        die("Query failed: " . mysqli_error($con));
                    }

                    while ($single_row_images = mysqli_fetch_assoc($Blog_images_result)) {
                        $image_path = "./adminPanel/assets/blogImages/blogGalleries/" . $single_row_images['blog_images'];
                        if (file_exists($image_path) && !empty($single_row_images['blog_images'])) {
                            echo "<a href='$image_path' data-lightbox='mygallery'>
                                    <img src='$image_path' alt='portfolio'>
                                  </a>";
                        } else {
                            echo "<p>Image not found.</p>";
                        }
                    }
                    ?>
                </div>
            </div>

           
        </div>
    </section>

<?php
}
?>





<?php include("footer.php")?>
<!-- send the data -->

<?php
    include 'connection.php';

    if (isset($_REQUEST['add_blog'])) {
        // Sanitize form inputs
        $blog_title = mysqli_real_escape_string($con, $_REQUEST['title']);
        $blog_author = mysqli_real_escape_string($con, $_REQUEST['author']);
        $blog_category = mysqli_real_escape_string($con, $_REQUEST['category']);
        $blog_content = mysqli_real_escape_string($con, $_REQUEST['content']);
    
        $message = $blog_content;
    
        // Get today's date
        $today_date = date('Y-m-d');
    
        // Handle the main blog image (head image)
        $image = preg_replace("/[^a-zA-Z0-9\._-]/", "_", $_FILES['head_img']['name']);
        $temp_name = $_FILES['head_img']['tmp_name'];
        $folder = "../assets/blogImages/blogTitle/" . $image;
    
        // Handle multiple images for the gallery
        $totalImages = count($_FILES['blog_images']['tmp_name']);
    
        // Check if more than 5 images are uploaded
        if ($totalImages > 5) {
            echo "<script>alert('You can only upload up to 5 images.'); window.history.back();</script>";
            exit;
        }
    
        // Insert blog data into the database including today's date
        $stmt = $con->prepare("INSERT INTO blogs (date, heading, content, Author, Category, image) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $today_date, $blog_title, $message, $blog_author, $blog_category, $image);
    
        if (move_uploaded_file($temp_name, $folder)) {
            if ($stmt->execute()) {
                echo "Blog data inserted successfully.<br>";
    
                // Get the last inserted blog ID
                $blog_id = $con->insert_id;
    
                // Process each image if the image count is valid
                foreach ($_FILES['blog_images']['tmp_name'] as $index => $tmpName) {
                    // Get and sanitize file name
                    $fileName = preg_replace("/[^a-zA-Z0-9\._-]/", "_", basename($_FILES['blog_images']['name'][$index]));
                    $fileTmpName = $_FILES['blog_images']['tmp_name'][$index];
                    $fileSize = $_FILES['blog_images']['size'][$index];
                    $fileError = $_FILES['blog_images']['error'][$index];
                    $uploadDir = "../assets/blogImages/blogGalleries/" . $fileName;
    
                    // Check for file upload errors
                    if ($fileError !== UPLOAD_ERR_OK) {
                        echo "Error uploading file $fileName. Please try again.<br>";
                        continue;
                    }
    
                    // Validate file type and size
                    $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
                    $fileType = mime_content_type($fileTmpName);
                    $maxFileSize = 5 * 1024 * 1024; // 5MB max file size
    
                    if (!in_array($fileType, $allowedTypes)) {
                        echo "Invalid file type for $fileName. Only JPG, PNG, and GIF files are allowed.<br>";
                        continue;
                    }
    
                    if ($fileSize > $maxFileSize) {
                        echo "File $fileName is too large. Maximum file size is 5MB.<br>";
                        continue;
                    }
    
                    // Prepare SQL statement to insert images into the blog_images table
                    $stmt_img = $con->prepare("INSERT INTO blog_images (blog_id, blog_images) VALUES (?, ?)");
                    $stmt_img->bind_param("is", $blog_id, $fileName);
    
                    // Execute the query
                    if ($stmt_img->execute()) {
                        if (move_uploaded_file($fileTmpName, $uploadDir)) {
                            echo "File $fileName uploaded successfully.<br>";
                        } else {
                            echo "Error moving file $fileName to the destination directory.<br>";
                        }
                    } else {
                        echo "Error: " . $stmt_img->error . "<br>";
                    }
    
                    // Close the prepared statement for images
                    $stmt_img->close();
                }
    
                // Redirect after successful insertion
                header("Location: ../blog_enter.php?error=sended");
                exit;
            } else {
                echo "Error: " . $stmt->error . "<br>";
            }
    
            // Close the prepared statement for the blog
            $stmt->close();
        } else {
            echo "Error uploading head image.<br>";
        }
    }
     else if(isset($_REQUEST['emaployee_add_blog']))
    {
    
         // Sanitize form inputs
    $blog_title = mysqli_real_escape_string($con, $_REQUEST['title']);
    $blog_author = mysqli_real_escape_string($con, $_REQUEST['author']);
    $blog_category = mysqli_real_escape_string($con, $_REQUEST['category']);
    $blog_content = mysqli_real_escape_string($con, $_REQUEST['content']);
    
    // Get today's date
    $today_date = date('Y-m-d');

    // Handle the main blog image (head image)
    $image = preg_replace("/[^a-zA-Z0-9\._-]/", "_", $_FILES['head_img']['name']);
    $temp_name = $_FILES['head_img']['tmp_name'];
    $folder = "../assets/blogImages/blogTitle/" . $image;

    // Handle multiple images for the gallery
    $totalImages = count($_FILES['blog_images']['tmp_name']);

    // Check if more than 5 images are uploaded
    if ($totalImages > 5) {
        echo "<script>alert('You can only upload up to 5 images.'); window.history.back();</script>";
        exit;
    }

    // Insert blog data into the database
    $stmt = $con->prepare("INSERT INTO blogs (date, heading, content, Author, Category, image) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $today_date, $blog_title, $blog_content, $blog_author, $blog_category, $image);

    if (move_uploaded_file($temp_name, $folder)) {
        if ($stmt->execute()) {
            echo "Blog data inserted successfully.<br>";

            // Get the last inserted blog ID
            $blog_id = $con->insert_id;

            // Process each uploaded image
            foreach ($_FILES['blog_images']['tmp_name'] as $index => $tmpName) {
                $fileName = preg_replace("/[^a-zA-Z0-9\._-]/", "_", basename($_FILES['blog_images']['name'][$index]));
                $fileTmpName = $_FILES['blog_images']['tmp_name'][$index];
                $fileSize = $_FILES['blog_images']['size'][$index];
                $fileError = $_FILES['blog_images']['error'][$index];
                $uploadDir = "../assets/blogImages/blogGalleries/" . $fileName;

                // Check for file upload errors
                if ($fileError !== UPLOAD_ERR_OK) {
                    echo "Error uploading file $fileName. Please try again.<br>";
                    continue;
                }

                // Validate file type and size
                $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
                $fileType = mime_content_type($fileTmpName);
                $maxFileSize = 5 * 1024 * 1024; // 5MB

                if (!in_array($fileType, $allowedTypes)) {
                    echo "Invalid file type for $fileName. Only JPG, PNG, and GIF files are allowed.<br>";
                    continue;
                }

                if ($fileSize > $maxFileSize) {
                    echo "File $fileName is too large. Maximum file size is 5MB.<br>";
                    continue;
                }

                // Insert image into the blog_images table
                $stmt_img = $con->prepare("INSERT INTO blog_images (blog_id, blog_images) VALUES (?, ?)");
                $stmt_img->bind_param("is", $blog_id, $fileName);

                if ($stmt_img->execute()) {
                    if (move_uploaded_file($fileTmpName, $uploadDir)) {
                        echo "File $fileName uploaded successfully.<br>";
                    } else {
                        echo "Error moving file $fileName to the destination directory.<br>";
                    }
                } else {
                    echo "Error: " . $stmt_img->error . "<br>";
                }
                $stmt_img->close();
            }

            // Redirect after successful insertion
            header("Location: ../../Profile.php?error=sended#add-blogs");
            exit;
        } else {
            echo "Error: " . $stmt->error . "<br>";
        }
        $stmt->close();
    } else {
        echo "Error uploading head image.<br>";
    }
    }
?>

<!-- delete -->
<?php
    include 'connection.php';

    if (isset($_REQUEST["blog_delete"])) {
        $blog_id = $_REQUEST["blog_delete"];

        // Fetch the main blog image to delete it
        $stmt = $con->prepare("SELECT image FROM blogs WHERE id = ?");
        $stmt->bind_param("i", $blog_id);
        $stmt->execute();
        $stmt->bind_result($main_image);
        $stmt->fetch();
        $stmt->close();

        // Delete the main blog image from the server
        if (!empty($main_image)) {
            $mainImagePath = "../assets/blogImages/blogTitle/" . $main_image;
            if (file_exists($mainImagePath)) {
                unlink($mainImagePath);
            }
        }

        // Fetch all associated images from blog_images table
        $stmt = $con->prepare("SELECT blog_images FROM blog_images WHERE blog_id = ?");
        $stmt->bind_param("i", $blog_id);
        $stmt->execute();
        $result = $stmt->get_result();

        // Delete each image file from the server
        while ($row = $result->fetch_assoc()) {
            $imagePath = "../assets/blogImages/blogGalleries/" . $row['blog_images'];
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
        $stmt->close();

        // Delete the images from blog_images table
        $stmt = $con->prepare("DELETE FROM blog_images WHERE blog_id = ?");
        $stmt->bind_param("i", $blog_id);
        $stmt->execute();
        $stmt->close();

        // Delete the blog post from blogs table
        $stmt = $con->prepare("DELETE FROM blogs WHERE id = ?");
        $stmt->bind_param("i", $blog_id);
        if ($stmt->execute()) {
            echo "Blog and associated images deleted successfully.";
            header("Location: ../blog_enter.php?error=Deleted");
        } else {
            echo "Error deleting blog: " . $stmt->error;
        }
        $stmt->close();

        // Close database connection
        $con->close();
    }elseif(isset($_REQUEST["blog_delete_emp"])){
        $blog_id = $_REQUEST["blog_delete_emp"];

        // Fetch the main blog image to delete it
        $stmt = $con->prepare("SELECT image FROM blogs WHERE id = ?");
        $stmt->bind_param("i", $blog_id);
        $stmt->execute();
        $stmt->bind_result($main_image);
        $stmt->fetch();
        $stmt->close();

        // Delete the main blog image from the server
        if (!empty($main_image)) {
            $mainImagePath = "../assets/blogImages/blogTitle/" . $main_image;
            if (file_exists($mainImagePath)) {
                unlink($mainImagePath);
            }
        }

        // Fetch all associated images from blog_images table
        $stmt = $con->prepare("SELECT blog_images FROM blog_images WHERE blog_id = ?");
        $stmt->bind_param("i", $blog_id);
        $stmt->execute();
        $result = $stmt->get_result();

        // Delete each image file from the server
        while ($row = $result->fetch_assoc()) {
            $imagePath = "../assets/blogImages/blogGalleries/" . $row['blog_images'];
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
        $stmt->close();

        // Delete the images from blog_images table
        $stmt = $con->prepare("DELETE FROM blog_images WHERE blog_id = ?");
        $stmt->bind_param("i", $blog_id);
        $stmt->execute();
        $stmt->close();

        // Delete the blog post from blogs table
        $stmt = $con->prepare("DELETE FROM blogs WHERE id = ?");
        $stmt->bind_param("i", $blog_id);
        if ($stmt->execute()) {
            echo "Blog and associated images deleted successfully.";
            header("Location:../../Profile.php?error=deleted#add-blogs");
        } else {
            echo "Error deleting blog: " . $stmt->error;
        }
        $stmt->close();

        // Close database connection
        $con->close();
    }
?>


<!-- update the data -->

<?php
include 'connection.php';

if (isset($_REQUEST["update_blog"])) {
    $blog_id = $_REQUEST['blog_up_id']; // Corrected variable name
    $blog_title = $_REQUEST['title'];
    $up_blog_author = $_REQUEST['author'];
    $up_blog_category = $_REQUEST['category'];
    $up_blog_content = $_REQUEST['content'];

    $message = mysqli_real_escape_string($con, $up_blog_content);

    // Fetch the existing image from the database BEFORE updating
    $query = "SELECT image FROM blogs WHERE id = '$blog_id'";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);
    $existing_image = $row['image'];

    // Handle the main blog image (head image)
    $up_image = $_FILES['head_img']['name'];
    $up_temp_name = $_FILES['head_img']['tmp_name'];
    $up_folder = "../assets/blogImages/blogTitle/" . $up_image;

    // If a new image is uploaded, delete the old image
    if (!empty($up_image)) {
        $old_image_path = "../assets/blogImages/blogTitle/" . $existing_image;
        if (file_exists($old_image_path) && !empty($existing_image)) {
            unlink($old_image_path); // Remove the old image
        }

        // Move the new image to the designated folder
        move_uploaded_file($up_temp_name, $up_folder);

        // Update the query with the new image
        $update_query = "UPDATE blogs SET heading = '$blog_title', content = '$message', Author = '$up_blog_author', Category = '$up_blog_category', image = '$up_image' WHERE id = '$blog_id'";
    } else {
        // If no new image, update everything else EXCEPT the image
        $update_query = "UPDATE blogs SET heading = '$blog_title', content = '$message', Author = '$up_blog_author', Category = '$up_blog_category' WHERE id = '$blog_id'";
    }

    if (mysqli_query($con, $update_query)) {
        echo "ok";
        header("Location: ../index.php"); // Redirect on success
        exit();
    } else {
        echo "Error updating blog: " . mysqli_error($con);
    }
} else if (isset($_REQUEST["update_blog_emp"])) {
    $blog_id = $_REQUEST['blog_up_id']; // Corrected variable name
    $blog_title = $_REQUEST['title'];
    $up_blog_author = $_REQUEST['author'];
    $up_blog_category = $_REQUEST['category'];
    $up_blog_content = $_REQUEST['content'];

    $message = mysqli_real_escape_string($con, $up_blog_content);

    // Fetch the existing image from the database BEFORE updating
    $query = "SELECT image FROM blogs WHERE id = '$blog_id'";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);
    $existing_image = $row['image'];

    // Handle the main blog image (head image)
    $up_image = $_FILES['head_img']['name'];
    $up_temp_name = $_FILES['head_img']['tmp_name'];
    $up_folder = "../assets/blogImages/blogTitle/" . $up_image;

    // If a new image is uploaded, delete the old image
    if (!empty($up_image)) {
        $old_image_path = "../assets/blogImages/blogTitle/" . $existing_image;
        if (file_exists($old_image_path) && !empty($existing_image)) {
            unlink($old_image_path); // Remove the old image
        }

        // Move the new image to the designated folder
        move_uploaded_file($up_temp_name, $up_folder);

        // Update the query with the new image
        $update_query = "UPDATE blogs SET heading = '$blog_title', content = '$message', Author = '$up_blog_author', Category = '$up_blog_category', image = '$up_image' WHERE id = '$blog_id'";
    } else {
        // If no new image, update everything else EXCEPT the image
        $update_query = "UPDATE blogs SET heading = '$blog_title', content = '$message', Author = '$up_blog_author', Category = '$up_blog_category' WHERE id = '$blog_id'";
    }

    if (mysqli_query($con, $update_query)) {
        echo "up";
        header("Location:../../Profile.php?error=updated#add-blogs");
    } else {
        echo "Error updating blog: " . mysqli_error($con);
    }
}

mysqli_close($con);
?>

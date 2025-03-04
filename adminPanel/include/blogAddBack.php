<?php
    include 'connection.php';

    if (isset($_REQUEST['add_blog'])) {
        // Get blog data from the form
        $blog_title = $_REQUEST['title'];
        $blog_author = $_REQUEST['author'];
        $blog_category = $_REQUEST['category'];
        $blog_content = $_REQUEST['content'];

        $message = mysqli_real_escape_string($con, $blog_content);

        // Get today's date
        $today_date = date('Y-m-d'); // Format: YYYY-MM-DD

        // Handle the main blog image (head image)
        $image = $_FILES['head_img']['name'];
        $img_size = $_FILES['head_img']['size'];
        $temp_name = $_FILES['head_img']['tmp_name'];
        $folder = "../blogImages/blogTitle/" . $image;

        // Handle multiple images for the gallery
        $totalImages = count($_FILES['blog_images']['tmp_name']);
        
        // Check if more than 5 images are uploaded
        if ($totalImages > 5) {
            // Rollback the insertion if there are more than 5 images
            echo "<script>alert('You can only upload up to 5 images.'); window.history.back();</script>";
            exit;  // Stop the execution of the script
        } else {
            // Insert blog data into the database including today's date
            $stmt = $con->prepare("INSERT INTO blogs (date, heading, content, Author, Category, image) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssssss", $today_date, $blog_title, $message, $blog_author, $blog_category, $image);

            if (move_uploaded_file($temp_name, $folder)) {
                // If blog data is inserted successfully, process images
                if ($stmt->execute()) {
                    echo "Blog data inserted successfully.<br>";

                    // Get the last inserted blog ID
                    $blog_id = $con->insert_id;

                    // Process each image if the image count is valid
                    foreach ($_FILES['blog_images']['tmp_name'] as $index => $tmpName) {
                        // Get the file details for each uploaded image
                        $fileName = basename($_FILES['blog_images']['name'][$index]);
                        $fileTmpName = $_FILES['blog_images']['tmp_name'][$index];
                        $fileSize = $_FILES['blog_images']['size'][$index];
                        $fileError = $_FILES['blog_images']['error'][$index];
                        $uploadDir = "../blogImages/blogGalleries/" . $fileName;

                        // Validate the file (size, type, error)
                        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif']; // Allowed MIME types
                        $fileType = mime_content_type($fileTmpName);
                        $maxFileSize = 5 * 1024 * 1024; // 5MB max file size

                        // Check for errors in file upload
                        if ($fileError !== UPLOAD_ERR_OK) {
                            echo "Error uploading file $fileName. Please try again.<br>";
                            continue;
                        }

                        // Validate MIME type
                        if (!in_array($fileType, $allowedTypes)) {
                            echo "Invalid file type for $fileName. Only JPG, PNG, and GIF files are allowed.<br>";
                            continue;
                        }

                        // Validate file size
                        if ($fileSize > $maxFileSize) {
                            echo "File $fileName is too large. Maximum file size is 5MB.<br>";
                            continue;
                        }

                        // Sanitize file name to prevent malicious file names
                        $fileName = preg_replace("/[^a-zA-Z0-9\._-]/", "_", $fileName); // Allow only alphanumeric characters, dots, dashes, and underscores

                        // Prepare SQL statement to insert images into the blog_images table
                        $stmt_img = $con->prepare("INSERT INTO blog_images (blog_id, blog_images) VALUES (?, ?)");
                        $stmt_img->bind_param("is", $blog_id, $fileName); // Corrected bind_param

                        // Execute the query
                        if ($stmt_img->execute()) {
                            // Move the file to the destination directory
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
                } else {
                    echo "Error: " . $stmt->error . "<br>";
                }

                // Close the prepared statement for the blog
                $stmt->close();
            } else {
                echo "Error uploading head image.<br>";
            }
        }
    }
?>

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
            $mainImagePath = "../blogImages/blogTitle/" . $main_image;
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
            $imagePath = "../blogImages/blogGalleries/" . $row['blog_images'];
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
    }
?>

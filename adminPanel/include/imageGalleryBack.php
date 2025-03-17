<!-- query for image send -->

<?php
include 'connection.php';

if (isset($_POST['img_submit'])) {
   // Get category from form
   $category = isset($_POST['category']) ? $_POST['category'] : "Uncategorized";

   foreach ($_FILES['images']['tmp_name'] as $index => $tmpName) {
       $fileName = basename($_FILES['images']['name'][$index]);
       $fileTmpName = $_FILES['images']['tmp_name'][$index];
       $fileSize = $_FILES['images']['size'][$index];
       $fileError = $_FILES['images']['error'][$index];
       $uploadDir = "../assets/imagesLibrary/" . $fileName;

       // Validate file type and size
       $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
       $fileType = mime_content_type($fileTmpName);
       $maxFileSize = 5 * 1024 * 1024; // 5MB max

       if ($fileError !== UPLOAD_ERR_OK) {
           echo "Error uploading file $fileName.";
           continue;
       }

       if (!in_array($fileType, $allowedTypes)) {
           echo "Invalid file type for $fileName.";
           continue;
       }

       if ($fileSize > $maxFileSize) {
           echo "File $fileName is too large.";
           continue;
       }

       // Sanitize filename
       $fileName = preg_replace("/[^a-zA-Z0-9\._-]/", "_", basename($fileName));

       // Insert image and category into database
       $stmt = $con->prepare("INSERT INTO image_gallery (image, category) VALUES (?, ?)");
       if ($stmt === false) {
           echo "Error preparing SQL.";
           continue;
       }

       $stmt->bind_param("ss", $fileName, $category);
       $result = $stmt->execute();

       if ($result) {
           if (move_uploaded_file($fileTmpName, $uploadDir)) {
               echo "File $fileName uploaded successfully.";
               header("Location: ../add_gallery.php?success=1");
               exit; // Make sure to exit after redirect
           } else {
               echo "Error moving file $fileName.";
           }
       } else {
           echo "Error: " . $stmt->error;
       }

       $stmt->close();
   }
}else if(isset($_POST['emplayee_img_submit'])){
// Get category from form
$category = isset($_POST['category']) ? $_POST['category'] : "Uncategorized";

foreach ($_FILES['images']['tmp_name'] as $index => $tmpName) {
    $fileName = basename($_FILES['images']['name'][$index]);
    $fileTmpName = $_FILES['images']['tmp_name'][$index];
    $fileSize = $_FILES['images']['size'][$index];
    $fileError = $_FILES['images']['error'][$index];
    $uploadDir = "../assets/imagesLibrary/" . $fileName;

    // Validate file type and size
    $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
    $fileType = mime_content_type($fileTmpName);
    $maxFileSize = 5 * 1024 * 1024; // 5MB max

    if ($fileError !== UPLOAD_ERR_OK) {
        echo "Error uploading file $fileName.";
        continue;
    }

    if (!in_array($fileType, $allowedTypes)) {
        echo "Invalid file type for $fileName.";
        continue;
    }

    if ($fileSize > $maxFileSize) {
        echo "File $fileName is too large.";
        continue;
    }

    // Sanitize filename
    $fileName = preg_replace("/[^a-zA-Z0-9\._-]/", "_", $fileName);

    // Insert image and category into database
    $stmt = $con->prepare("INSERT INTO image_gallery (image, category) VALUES (?, ?)");
    if ($stmt === false) {
        echo "Error preparing SQL.";
        continue;
    }

    $stmt->bind_param("ss", $fileName, $category);
    $result = $stmt->execute();

    if ($result) {
        if (move_uploaded_file($fileTmpName, $uploadDir)) {
            echo "File $fileName uploaded successfully.";
            header("Location: ../../Profile.php?success=1#add-images-to-gallery");
        } else {
            echo "Error moving file $fileName.";
        }
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
}
?>




<!-- query for delete  -->

<?php
include 'connection.php';

if (isset($_REQUEST['img_id'])) {
    $id = $_REQUEST['img_id'];

    // Prepare the SQL query to prevent SQL injection
    $sql_Search = "SELECT image FROM image_gallery WHERE id = ?";
    $stmt = mysqli_prepare($con, $sql_Search);
    
    // Bind the id to the prepared statement
    mysqli_stmt_bind_param($stmt, "i", $id);
    
    // Execute the query
    mysqli_stmt_execute($stmt);
    $result_search = mysqli_stmt_get_result($stmt);

    if ($result_search) {
        $result_row = mysqli_fetch_assoc($result_search);
        $currentImage = $result_row['image'];

        // Delete the image from the database
        $sql_del = "DELETE FROM image_gallery WHERE id = ?";
        $stmt_del = mysqli_prepare($con, $sql_del);
        
        // Bind the id to the prepared statement
        mysqli_stmt_bind_param($stmt_del, "i", $id);

        // Execute the deletion
        $result = mysqli_stmt_execute($stmt_del);

        if ($result) {
            // Delete the image file from the server
            $imagePath = "../assets/imagesLibrary/" . $currentImage;
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }

            // Redirect after successful deletion
            header("Location: ../add_gallery.php?error=deleted");
            exit;
        }
    }
}else if(isset($_REQUEST['img_id_emp'])){
    $id = $_REQUEST['img_id_emp'];

    // Prepare the SQL query to prevent SQL injection
    $sql_Search = "SELECT image FROM image_gallery WHERE id = ?";
    $stmt = mysqli_prepare($con, $sql_Search);
    
    // Bind the id to the prepared statement
    mysqli_stmt_bind_param($stmt, "i", $id);
    
    // Execute the query
    mysqli_stmt_execute($stmt);
    $result_search = mysqli_stmt_get_result($stmt);

    if ($result_search) {
        $result_row = mysqli_fetch_assoc($result_search);
        $currentImage = $result_row['image'];

        // Delete the image from the database
        $sql_del = "DELETE FROM image_gallery WHERE id = ?";
        $stmt_del = mysqli_prepare($con, $sql_del);
        
        // Bind the id to the prepared statement
        mysqli_stmt_bind_param($stmt_del, "i", $id);

        // Execute the deletion
        $result = mysqli_stmt_execute($stmt_del);

        if ($result) {
            // Delete the image file from the server
            $imagePath = "../assets/imagesLibrary/" . $currentImage;
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }

            // Redirect after successful deletion
            header("Location: ../../Profile.php?error=deleted#add-images-to-gallery");
            exit;
        }
    }
}
?>




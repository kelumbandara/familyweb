<?php
include 'connection.php';

if (isset($_POST['img_submit'])) {
    // Loop through each uploaded image
    foreach ($_FILES['images']['tmp_name'] as $index => $tmpName) {
        // Get the original file name and sanitize it
        $fileName = basename($_FILES['images']['name'][$index]);
        $fileTmpName = $_FILES['images']['tmp_name'][$index];
        $fileSize = $_FILES['images']['size'][$index];
        $fileError = $_FILES['images']['error'][$index];
        $uploadDir = "../imagesLibrary/" . $fileName;

        // Validate the file (size, type, error)
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif']; // Allowed MIME types
        $fileType = mime_content_type($fileTmpName);
        $maxFileSize = 5 * 1024 * 1024; // 5MB max file size

        // Check for errors in file upload
        if ($fileError !== UPLOAD_ERR_OK) {
            echo "Error uploading file $fileName. Please try again.";
            continue;
        }

        // Validate MIME type
        if (!in_array($fileType, $allowedTypes)) {
            echo "Invalid file type for $fileName. Only JPG, PNG, and GIF files are allowed.";
            continue;
        }

        // Validate file size
        if ($fileSize > $maxFileSize) {
            echo "File $fileName is too large. Maximum file size is 5MB.";
            continue;
        }

        // Sanitize file name to prevent malicious file names
        $fileName = preg_replace("/[^a-zA-Z0-9\._-]/", "_", $fileName); // Allow only alphanumeric characters, dots, dashes, and underscores

        // Prepare SQL statement using prepared statements to prevent SQL injection
        $stmt = $con->prepare("INSERT INTO image_gallery (image) VALUES (?)");
        if ($stmt === false) {
            echo "Error preparing the SQL statement.";
            continue;
        }

        // Bind parameters and execute the query
        $stmt->bind_param("s", $fileName);
        $result = $stmt->execute();

        // Check if the query was successful
        if ($result) {
            // Move the file to the destination directory if everything is valid
            if (move_uploaded_file($fileTmpName, $uploadDir)) {
                echo "File $fileName uploaded successfully.";
                header("Location: ../add_gallery.php?error=sended");
            } else {
                echo "Error moving file $fileName to the destination directory.";
            }
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close the prepared statement
        $stmt->close();
    }
}
?>

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
            $imagePath = "../imagesLibrary/" . $currentImage;
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }

            // Redirect after successful deletion
            header("Location: ../add_gallery.php?error=deleted");
            exit;
        }
    }
}
?>



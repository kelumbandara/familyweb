<?php

include 'connection.php';

if (isset($_REQUEST['update'])) {

    $userName = mysqli_real_escape_string($con, $_REQUEST["user"]);
    $Name = mysqli_real_escape_string($con, $_REQUEST["name"]);
    $userEmail = mysqli_real_escape_string($con, $_REQUEST["email"]);
    $companyName = mysqli_real_escape_string($con, $_REQUEST["company"]);

    $Image = $_FILES['ImgFile']['name'];
    $img_size = $_FILES['ImgFile']['size'];
    $temp_name = $_FILES['ImgFile']['tmp_name'];
    $folder = "../assets/images/Member images/" . $Image;

    // Check image size
    if ($img_size > 10000000) {
        header('Location: ../register.php?error=tolarg');
        exit();
    }

    // Get the current image from the database
    $sql1 = "SELECT image FROM register WHERE user_name='$userName'";
    $result1 = mysqli_query($con, $sql1);

    if ($result1 && mysqli_num_rows($result1) > 0) {
        $row = mysqli_fetch_assoc($result1);
        $currentImage = $row['image'];

        if (!empty($Image)) {
            $image_data = $Image;

            // Delete old image if it exists
            if (!empty($currentImage) && file_exists("../assets/images/Member images/" . $currentImage)) {
                unlink("../assets/images/Member images/" . $currentImage);
            }
        } else {
            $image_data = $currentImage; // Retain old image if no new image is uploaded
        }
    } else {
        header("Location: ../profile.php?error=usernotfound");
        exit();
    }

    // Update user details
    $sql = "UPDATE register SET user_name='$userName', Name='$Name', Company_Name='$companyName', email='$userEmail', image='$image_data' WHERE user_name='$userName'";
    $result = mysqli_query($con, $sql);

    if ($result) {
        // Move new image if uploaded
        if (!empty($Image)) {
            move_uploaded_file($temp_name, $folder);
        }
        header("Location: ../profile.php?editSuccess");
        exit();
    } else {
        echo "Error: " . mysqli_error($con);
    }
}

?>

<?php
if (isset($_REQUEST["submitPassword"])) {
    include("connection.php"); // Ensure the correct database connection is included.
    session_start(); // Start the session to access session variables (if needed).

    $pass_id = $_REQUEST["hidden_id"];
    $compassword = $_REQUEST["ComPassword"];

    // Validate the password (optional)
    if (empty($compassword)) {
        header("Location: ../Profile.php?error=emptyPassword");
        exit();
    }

    // Hash the password securely before saving it to the database
    $hashedPassword = password_hash($compassword, PASSWORD_DEFAULT);

    // Using a prepared statement to safely update the password
    $sql = "UPDATE register SET password = ? WHERE id = ?";
    $stmt = mysqli_prepare($con, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "si", $hashedPassword, $pass_id);
        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            // Redirect to the profile page after successful password update
            header("Location: ../Profile.php?editPasswordSuccess");
            exit();
        } else {
            // Handle query execution failure
            echo "Error: " . mysqli_error($con);
        }

        // Close the prepared statement
        mysqli_stmt_close($stmt);
    } else {
        // If the prepared statement failed to prepare
        echo "Error: " . mysqli_error($con);
    }

    // Close the database connection
    mysqli_close($con);
}
?>


<?php

if (isset($_REQUEST["bio"])) {

   echo $id = $_REQUEST["id"];
   echo $birthday = date('Y-m-d', strtotime($_REQUEST["age"]));
   echo $country = $_REQUEST["country"];
   echo $phone = $_REQUEST["contact"];


    $sql = "UPDATE register SET age='$birthday', country='$country', contact='$phone' WHERE id=$id";
    $result = mysqli_query($con, $sql);
    if ($result) {
        header("Location: ../profile.php?editSuccess");
    } else {
        echo "Error: ". mysqli_error($con);
    }

}



?>

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
    $folder = "../image/Memberimages/" . $Image;

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
            if (!empty($currentImage) && file_exists("../image/Memberimages/" . $currentImage)) {
                unlink("../image/Memberimages/" . $currentImage);
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
    $id = $_REQUEST["id"];

    $password = $_REQUEST["NewPssword"];
    $compassword = $_REQUEST["ComPassword"];

    $hashed_password = password_hash($compassword, PASSWORD_DEFAULT);

    $sql = "UPDATE register SET user_name='$username', password='$hashed_password' WHERE id=$id";
    $result = mysqli_query($con, $sql);
    if ($result) {
        header("Location:../dashbord.php?editPasswordSuccess");
    } else {
        echo "Error: ". mysqli_error($con);
    }


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

<?php

include 'connection.php';

if(isset($_REQUEST['update'])){

    $userName=$_REQUEST["user"];
    $Name=$_REQUEST["name"];
    $userEmail=$_REQUEST["email"];
    $companyName=$_REQUEST["company"];

    $sql = "UPDATE register SET user_name='$userName', Name='$Name', Company_Name='$companyName', email='$userEmail'  WHERE user_name='$userName'";
    $result = mysqli_query($con, $sql);
    if ($result) {
        header("Location:../profile.php?editSuccess");
    } else {
        echo "Error: ". mysqli_error($conn);
    }

}

if (isset($_REQUEST["submitPassword"])) {
    $id = $_REQUEST["id"];
    $username = $_REQUEST["UserName"];
    $password = $_REQUEST["Password"];
    $compassword = $_REQUEST["ComPassword"];

    $hashed_password = password_hash($compassword, PASSWORD_DEFAULT);

    $sql = "UPDATE users SET username='$username', password='$hashed_password' WHERE id=$id";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header("Location:../dashbord.php?editPasswordSuccess");
    } else {
        echo "Error: ". mysqli_error($conn);
    }


}
?>
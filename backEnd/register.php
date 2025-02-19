<?php

include("connection.php");

if (isset($_REQUEST["register"])) {
   
    $username = $_REQUEST["regi_Username"];
    $Email= $_REQUEST["regi_UserEmail"]; 
    $password = md5($_REQUEST["regi_Password"]); 
    
    
    $sql = "SELECT * FROM register where user_name='$username' ";

    $result = mysqli_query($con, $sql);
    if ($result->num_rows > 0) {
        echo "Error: Duplicate entry. Please choose a different username.";
        header("Location:../loginPage.php?RegisterError");
        exit();
    } else {

        $sql2 = "INSERT INTO register (user_name,email,password) VALUES ('$username','$Email','$password')";

        $result1 = mysqli_query($con, $sql2);
        if ($result1) {
            echo "New record created successfully";
            header("Location: ../index.php");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}
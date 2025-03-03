<?php
session_start();
include('connection.php'); // Fix the path if needed

// Check if the login form was submitted
if (isset($_REQUEST['login'])) {
    $usName = trim($_REQUEST['login_Username']);
    $password = $_REQUEST['login_Password']; // Don't hash the password here

    // Validate empty input fields
    if (empty($usName) || empty($password)) {
        header('Location: ../loginPage.php?error=emptyFields');
        exit();
    }

    // Check if the user is an admin
    $query1 = "SELECT * FROM admin_login WHERE user_name = ?";
    $stmt1 = mysqli_prepare($con, $query1);
    mysqli_stmt_bind_param($stmt1, "s", $usName);
    mysqli_stmt_execute($stmt1);
    $result1 = mysqli_stmt_get_result($stmt1);

    if ($row = mysqli_fetch_assoc($result1)) {
        // Verify password for admin
        if (password_verify($password, $row['password'])) {
            $_SESSION['adminId'] = $row['id'];
            $_SESSION['adminName'] = $row['user_name'];
            $_SESSION['role'] = "admin"; // Set role to admin

            header("Location: ../index.php?admin"); // Redirect to the admin home page
            exit();
        } else {
            header('Location: ../loginPage.php?error=wrongPassword');
            exit();
        }
    }

    // Check if the user is an employee
    $query = "SELECT * FROM register WHERE user_name = ?";
    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, "s", $usName);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {
        // Verify password for employee
        if (password_verify($password, $row['password'])) {
            $_SESSION['userid'] = $row['id'];
            $_SESSION['UsName'] = $row['user_name'];
            $_SESSION['role'] = "employee"; // Set role to employee

            header("Location: ../index.php?employee"); // Redirect to the employee home page
            exit();
        } else {
            header('Location: ../loginPage.php?error=wrongPassword');
            exit();
        }
    } else {
        // If user doesn't exist in either table
        header('Location: ../loginPage.php?error=userNotExists');
        exit();
    }

} else {
    // If login was not submitted, redirect to login page
    header('Location: ../loginPage.php');
    exit();
}
?>

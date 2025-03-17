<?php
session_start();
include('connection.php'); // Ensure correct database connection

// Check if the login form was submitted
if (isset($_POST['login'])) {
    $usName = trim($_POST['login_Username']);
    $password = trim($_POST['login_Password']); // User entered password (plain text)

    // Validate empty input fields
    if (empty($usName) || empty($password)) {
        header('Location: ../loginPage.php?error=emptyFields');
        exit();
    }

    // === Check if the user is an admin ===
    $query1 = "SELECT * FROM admin_login WHERE user_name = ?";
    $stmt1 = mysqli_prepare($con, $query1);

    if ($stmt1) {
        mysqli_stmt_bind_param($stmt1, "s", $usName);
        mysqli_stmt_execute($stmt1);
        $result1 = mysqli_stmt_get_result($stmt1);

        if ($rowAdmin = mysqli_fetch_assoc($result1)) {
            // Verify password for admin
            if (password_verify($password, $rowAdmin['password'])) { // Use plain password for verification
                $_SESSION['adminId'] = $rowAdmin['id'];
                $_SESSION['adminName'] = $rowAdmin['user_name'];
                $_SESSION['role'] = "admin"; // Set role to admin

                header("Location: ../index.php?admin"); // Redirect to the admin home page
                exit();
            } else {
                header('Location: ../loginPage.php?error=wrongPassword');
                exit();
            }
        }
        mysqli_stmt_close($stmt1);
    } else {
        header('Location: ../loginPage.php?error=queryError');
        exit();
    }

    // === Check if the user is an approved employee ===
    $query = "SELECT id, user_name, password FROM register WHERE user_name = ? AND aprove = '1'";
    $stmt = mysqli_prepare($con, $query);
    
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "s", $usName);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
    
        if ($rowEmployee = mysqli_fetch_assoc($result)) {
            // Verify the entered plain password with the hashed password in the database
            if (password_verify($password, $rowEmployee['password'])) { // Use plain password for verification
                $_SESSION['userid'] = $rowEmployee['id'];
                $_SESSION['UsName'] = $rowEmployee['user_name'];
                $_SESSION['role'] = "employee"; // Set role to employee
    
                // Redirect to the employee home page
                header("Location: ../index.php?employe=approved");
                exit();
            } else {
                // If password doesn't match, show the error message
                header('Location: ../loginPage.php?error=wrongPassword');
                exit();
            }
        } else {
            // User not found or not approved
            header('Location: ../loginPage.php?error=userNotExistsOrNotApproved');
            exit();
        }
    
        mysqli_stmt_close($stmt);
    } else {
        header('Location: ../loginPage.php?error=queryError');
        exit();
    }
} else {
    header('Location: ../loginPage.php');
    exit();
}
?>

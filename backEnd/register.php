<?php
include("connection.php");
if (isset($_REQUEST["register"])) {
    // Trim input data to remove unwanted spaces
    $username = trim($_REQUEST["regi_Username"]);
    $email = trim($_REQUEST["regi_UserEmail"]);
    $password = trim($_REQUEST["regi_Password"]);

    // Validate empty fields
    if (empty($username) || empty($email) || empty($password)) {
        header("Location: ../loginPage.php?error=emptyfields");
        exit();
    }

    // Check if username already exists (Using Prepared Statement)
    $sql = "SELECT id FROM register WHERE user_name = ?";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        // Redirect to loginPage.php with error (username exists)
        header("Location: ../loginPage.php?error=duplicate");
        exit();
    }

    // Hash password securely
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insert user (Using Prepared Statement)
    $sql2 = "INSERT INTO register (user_name, email, password) VALUES (?, ?, ?)";
    $stmt2 = mysqli_prepare($con, $sql2);
    mysqli_stmt_bind_param($stmt2, "sss", $username, $email, $hashedPassword);
    $result2 = mysqli_stmt_execute($stmt2);

    if ($result2) {
        // Store the new user ID in session
        $_SESSION['regid'] = mysqli_insert_id($con);
        $_SESSION['UsName'] = $username;

        // === Automatically log in the user after successful registration ===
        // Prepare SQL to fetch the newly registered user
        $query = "SELECT id, user_name, password, aprove FROM register WHERE user_name = ?";
        $stmt3 = mysqli_prepare($con, $query);
        mysqli_stmt_bind_param($stmt3, "s", $username);
        mysqli_stmt_execute($stmt3);
        $result3 = mysqli_stmt_get_result($stmt3);

        if ($row = mysqli_fetch_assoc($result3)) {
            // Check if the user is approved by admin (aprove = 1)
            if ($row['aprove'] == 0) {
                // If not approved, inform the user to wait for admin approval
                header("Location: ../loginPage.php?error=waitingForApproval");
                exit();
            }

            // Verify password for login if the user is approved
            if (password_verify($password, $row['password'])) {
                $_SESSION['userid'] = $row['id'];
                $_SESSION['UsName'] = $row['user_name'];
                $_SESSION['role'] = "employee"; // You can modify this depending on user type

                // Redirect to the homepage or dashboard
                header("Location: ../index.php?user=" . urlencode($_SESSION['UsName']));
                exit();
            } else {
                // If password doesn't match (though it should)
                header('Location: ../loginPage.php?error=wrongPassword');
                exit();
            }
        } else {
            // If the user is not found or not approved
            header('Location: ../loginPage.php?error=userNotExistsOrNotApproved');
            exit();
        }

        // Close the query statement
        mysqli_stmt_close($stmt3);
    } else {
        // Handle database error and display an error message
        echo "Error: " . mysqli_error($con);
    }

    // Close prepared statements & DB connection
    mysqli_stmt_close($stmt);
    mysqli_stmt_close($stmt2);
    mysqli_close($con);
}
?>

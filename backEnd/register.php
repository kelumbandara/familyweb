<?php
if (isset($_REQUEST["register"])) {
    include("connection.php");
    session_start();

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

        // Redirect to the homepage with the username
        header("Location: ../index.php?user=" . urlencode($_SESSION['UsName']));
        exit();
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

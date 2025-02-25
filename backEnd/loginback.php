<?php
if (isset($_REQUEST['login'])) {
    session_start();
    include('connection.php');

    // Trim input to remove unnecessary spaces
    $usName = trim($_REQUEST['login_Username']);
    $password = md5($_REQUEST['login_Password']);

    // Validate empty input
    if (empty($usName) || empty($password)) {
        header('Location: ../loginPage.php?error=emptyFields');
        exit();
    }

    // Use prepared statement to prevent SQL Injection
    $query = "SELECT * FROM register WHERE user_name = ?";
    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, "s", $usName);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    // Check if user exists
    if ($row = mysqli_fetch_assoc($result)) {
        // Verify password using password_verify()
        if (password_verify($password, $row['password'])) {
            $_SESSION['userid'] = $row['id'];
            $_SESSION['UsName'] = $row['user_name'];

            // Redirect to home page
            header("Location: ../index.php?user=" . urlencode($_SESSION['UsName']));
            exit();
        } else {
            header('Location: ../loginPage.php?error=wrongPassword');
            exit();
        }
    } else {
        header('Location: ../loginPage.php?error=userNotExists');
        exit();
    }

    // Close statement and database connection
    mysqli_stmt_close($stmt);
    mysqli_close($con);
} else {
    header('Location: ../loginPage.php');
    exit();
}
?>

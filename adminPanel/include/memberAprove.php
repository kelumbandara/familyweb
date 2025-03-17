<!-- aprove sql -->

<?php
include('connection.php');

$showAlert = false;
$alertMessage = '';

if (isset($_GET['value']) && isset($_GET['member_aprovel'])) {
    $value = (int) $_GET['value'];
    $memberId = (int) $_GET['member_aprovel']; 

    
    $aprovesql = "UPDATE register SET aprove = ? WHERE id = ?";
    if ($stmt = mysqli_prepare($con, $aprovesql)) {
  
        mysqli_stmt_bind_param($stmt, "ii", $value, $memberId);
        $request = mysqli_stmt_execute($stmt);

       
        if ($request) {
           
            header("Location: ../member_panel.php?appstatus=Aproved");
            exit();
        } else {
          
            header("Location: ../member_panel.php?appstatus=error");
            exit();
        }

        mysqli_stmt_close($stmt);
    } else {
       
        header("Location: ../member_panel.php?appstatus=error");
        exit();
    }
}
?>


<!-- dissaprove sql -->

<?php
include('connection.php');

if (isset($_GET['value']) && isset($_GET['member_disaprovel'])) {
    $value = (int) $_GET['value'];  
    $memberId = (int) $_GET['member_disaprovel'];  

 
    $aprovesql = "UPDATE register SET aprove = ? WHERE id = ?";

   
    if ($stmt = mysqli_prepare($con, $aprovesql)) {
      
        mysqli_stmt_bind_param($stmt, "ii", $value, $memberId);
        $request = mysqli_stmt_execute($stmt);

        if ($request) {
           
            header("Location: ../member_panel.php?disstatus=Disaprove");
            exit();
        } else {
           
            header("Location: ../member_panel.php?disstatus=error");
            exit();
        }

       
        mysqli_stmt_close($stmt);
    } else {
    
        header("Location: ../member_panel.php?disstatus=error");
        exit();
    }
    }  else if (isset($_REQUEST['member_delete'])) {
    $delete_id = (int) $_REQUEST['member_delete']; // Cast to integer for security

    // Prepare the DELETE SQL statement
    $delete_sql = "DELETE FROM register WHERE id = ?";
    if ($stmt = mysqli_prepare($con, $delete_sql)) {
        // Bind the delete_id to the prepared statement
        mysqli_stmt_bind_param($stmt, "i", $delete_id);
        // Execute the query
        $delete_result = mysqli_stmt_execute($stmt);

        if ($delete_result) {
            // Redirect to the member panel with a success message
            header("Location: ../member_panel.php?delete=success");
            exit();
        } else {
            // If deletion fails, redirect with error message
            header("Location: ../member_panel.php?delete=error");
            exit();
        }

        // Close the prepared statement
        mysqli_stmt_close($stmt);
    } else {
        // If the statement preparation fails, redirect with error
        header("Location: ../member_panel.php?delete=error");
        exit();
    }
}else {
   
    header("Location: ../member_panel.php?disstatus=error");
    exit();
}
?>


<?php
include('connection.php');


?>


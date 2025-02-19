<?php
if(isset($_REQUEST['login'])){

session_start();
include('connection.php');
$usName=$_REQUEST['login_Username'];
$passward=md5($_REQUEST['login_Password']);
$query="SELECT * FROM register WHERE  user_name='$usName' AND password='$passward'";

$result=mysqli_query($con,$query);

    if(mysqli_num_rows($result)>0){
        // $row=mysqli_fetch_assoc($result);
        // $_SESSION['userid']=$row['id'];
        // $_SESSION['UsName']=$row['UserName'];
        
        header('location:../index.php');
        exit();

    }else{
        header('location:../loginPage.php?error=userNotExists');
        exit();

    }


    }else{
        header('location:../loginPage.php');
        exit();
    }



?>
<!--Website: wwww.codingdung.com-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CodingDung | Profile Template</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- ________________Boxicons________________ -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <div class="container light-style flex-grow-1 container-p-y">
         <a href="./index.php" style="color: #000; font-size: 35px;" class="goBack"><i class='bx bx-arrow-back'><span style="margin-left: 20px;">Go Back</span></i></a>
        <h4 class="font-weight-bold py-3 mb-4">
           
            Account settings
        </h4>
        <div class="card overflow-hidden">
            <div class="row no-gutters row-bordered row-border-light">
                <div class="col-md-3 pt-0">
                    <div class="list-group list-group-flush account-settings-links">
                        <a class="list-group-item list-group-item-action active" data-toggle="list"
                            href="#account-general">General</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-change-password">Change password</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-info">Info</a>
                        <!-- <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-social-links">Social links</a> -->
                        <!-- <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-connections">Connections</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-notifications">Notifications</a> -->
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="account-general">
                            <?php
                            session_start();
                            include 'backEnd/connection.php';
                            if(isset($_SESSION['UsName'])){  
                                $user=$_SESSION["UsName"];

                                $query = "SELECT * FROM register WHERE user_name='$user'";

                                $result=mysqli_query($con,$query);
                                $row=mysqli_fetch_assoc($result);
                                ?>


                            <form action="backEnd/proUpdate.php" method="post" enctype="multipart/form-data">
                                <div class="card-body media align-items-center">
                                    <?php
                                        if($row['image']){
                                    ?>
                                        <img src="#" id="newImg" onerror="this.src='./image/Memberimages/<?php echo $row['image']?>'" class="d-block ui-w-80">
                                    <?php
                                        }else{
                                    ?>
                                        <img src="#" id="newImg" onerror="this.src='./image/Memberimages/avatar1.png'" class="d-block ui-w-80">
                                    <?php
                                        }
                                    ?>
                                   
                                    <div class="media-body ml-4">
                                        <label class="btn btn-outline-primary">
                                            Upload new photo
                                            <input type="file" name="ImgFile" id="InpImg" class="account-settings-fileinput">
                                        </label>
                                        <!-- &nbsp; -->
                                        <button type="button" class="btn btn-default md-btn-flat">Reset</button>
                                        <!-- <div class="text-light small mt-1">Allowed JPG, GIF or PNG. Max size of 800K
                                        </div> -->
                                    </div>
                                </div>
                                <hr class="border-light m-0">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label class="form-label">Username</label>
                                        <input type="text" class="form-control mb-1" name="user" placeholder="Username"
                                            value="<?php echo $row['user_name']?>">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Name</label>
                                        <input type="text" class="form-control" name="name" placeholder="Name"
                                            value="<?php echo $row['Name']?>">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">E-mail</label>
                                        <input type="text" class="form-control mb-1" name="email" placeholder="Email"
                                            value="<?php echo $row['email']?>">
                                        <!-- <div class="alert alert-warning mt-3">
                                        Your email is not confirmed. Please check your inbox.<br>
                                        <a href="javascript:void(0)">Resend confirmation</a>
                                    </div> -->
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Company</label>
                                        <input type="text" class="form-control" name="company"
                                            placeholder="Company Name" value="<?php echo $row['Company_Name']?>">
                                    </div>
                                    <div class="text-right mt-3">
                                        <!-- <button type="button" class="btn btn-primary">Save changes</button>&nbsp;
                                        <button type="button" class="btn btn-default">Cancel</button> -->
                                        <input type="submit" name="update" class="btn btn-primary" value="Update">
                                        <button type="reset" class="btn btn-default">Cancel</button>
                                    </div>
                                </div>
                            </form>

                            <script text="text/javascript">
                                InpImg.onchange= evt =>{
                                    const[file]=InpImg.files

                                    if(file){
                                        newImg.src=URL.createObjectURL(file)
                                    }
                                }
                            </script>

                            <?php
                            }
                            ?>

                        </div>



                        <div class="tab-pane fade" id="account-change-password">
                            <?php
                            include 'backEnd/connection.php';
                            if(isset($_SESSION['UsName'])){  
                                $user=$_SESSION["UsName"];

                                $query = "SELECT * FROM register WHERE user_name='$user'";

                                $result=mysqli_query($con,$query);
                                $row=mysqli_fetch_assoc($result);
                                ?>


                            <form action="backEnd/proUpdate.php" method="post">
                                <div class="card-body pb-2">
                                    <div class="form-group">
                                        <label class="form-label">Current password</label>
                                        <input type="password" class="form-control" name="oldPassword">
                                        <input type="hidden" class="form-control" name="hidden_oldPassword" value="<?php echo $row['password']?>">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">New password</label>
                                        <input type="password" class="form-control" name="NewPssword">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Repeat new password</label>
                                        <input type="password" class="form-control" name="ComPassword">
                                    </div>

                                    <div class="text-right mt-3">
                                        <button type="submit" class="btn btn-primary" name="pass">Save
                                            changes</button>&nbsp;
                                        <button type="button" class="btn btn-default">Cancel</button>
                                    </div>
                                </div>
                                <?php 
                            }
                            ?>
                        </div>



                        <div class="tab-pane fade" id="account-info">
                        <?php
                            include 'backEnd/connection.php';
                            if(isset($_SESSION['UsName'])){  
                                $user=$_SESSION["UsName"];

                                $query = "SELECT * FROM register WHERE user_name='$user'";

                                $result=mysqli_query($con,$query);
                                $row=mysqli_fetch_assoc($result);
                                ?>
                            <form action="./backEnd/proUpdate.php" method="post">
                            <div class="card-body pb-2">
                                <div class="form-group">
                                    <label class="form-label">Birthday</label>
                                    <input type="hidden" name="id" value="<?php echo $row['id']?>">
                                    <input type="date" class="form-control" name="age" value="<?php echo $row['age']?>">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Country</label>
                                    <input type="text" class="form-control" name="country" value="<?php echo $row['country']?>">
                                </div>
                            </div>
                            <hr class="border-light m-0">
                            <div class="card-body pb-2">
                                <h6 class="mb-4">Contacts</h6>
                                <div class="form-group">
                                    <label class="form-label">Phone</label>
                                    <input type="text" class="form-control" name="contact" value="<?php echo $row['contact']?>">
                                   
                                </div>
                                <div class="text-right mt-3">
                                    <input type="submit" name="bio" class="btn btn-primary" value="Submit Changes">&nbsp;
                                    <button type="button" class="btn btn-default">Cancel</button>
                                </div>
                            </div>
                            </form>

                            <?php
                            }
                            ?>
                        </div>



                        <!-- <div class="tab-pane fade" id="account-social-links">
                            <div class="card-body pb-2">
                                <div class="form-group">
                                    <label class="form-label">Twitter</label>
                                    <input type="text" class="form-control" value="https://twitter.com/user">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Facebook</label>
                                    <input type="text" class="form-control" value="https://www.facebook.com/user">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Google+</label>
                                    <input type="text" class="form-control" value>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">LinkedIn</label>
                                    <input type="text" class="form-control" value>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Instagram</label>
                                    <input type="text" class="form-control" value="https://www.instagram.com/user">
                                </div>
                                <div class="text-right mt-3">
                                    <button type="button" class="btn btn-primary">Save changes</button>&nbsp;
                                    <button type="button" class="btn btn-default">Cancel</button>
                                </div>
                            </div>

                        </div> -->




                    </div>
                </div>
            </div>
        </div>


    </div>
    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function validations() {
            var error = document.getElementById('error');
            var nameField = document.myform.name;
            var emailField = document.myform.email;
            var phoneField = document.myform.phone;
            var usernameField = document.myform.username;
            var passwordField = document.myform.password;
            var confirmPasswordField = document.myform.compassword;

            // Reset previous error states
            nameField.classList.remove('error-border');
            emailField.classList.remove('error-border');
            phoneField.classList.remove('error-border');
            usernameField.classList.remove('error-border');
            passwordField.classList.remove('error-border');
            confirmPasswordField.classList.remove('error-border');
            error.innerHTML = "";

            // Validate name
            if (nameField.value == '') {
                error.innerHTML = "Please enter your Name";
                nameField.classList.add('error-border');
                nameField.focus();
                return false;
            }

            // Validate email
            if (emailField.value == '') {
                error.innerHTML = "Please enter your Email";
                emailField.classList.add('error-border');
                emailField.focus();
                return false;
            }
            // Validate email format
            var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailPattern.test(emailField.value)) {
                error.innerHTML = "Please enter a valid Email";
                emailField.classList.add('error-border');
                emailField.focus();
                return false;
            }

            // Validate phone
            if (phoneField.value == '') {
                error.innerHTML = "Please enter your Phone";
                phoneField.classList.add('error-border');
                phoneField.focus();
                return false;
            }
            // Validate phone format
            var phonePattern = /^\+?[0-9]{1,3}?[-. ]?\(?[0-9]{1,4}\)?[-. ]?[0-9]{1,4}[-. ]?[0-9]{1,4}$/;
            if (!phonePattern.test(phoneField.value)) {
                error.innerHTML = "Please enter a valid Phone";
                phoneField.classList.add('error-border');
                phoneField.focus();
                return false;
            }

            // Validate username
            if (usernameField.value == '') {
                error.innerHTML = "Please enter your UserName";
                usernameField.classList.add('error-border');
                usernameField.focus();
                return false;
            }

            // Validate password
            if (passwordField.value == '') {
                error.innerHTML = "Please enter your Password";
                passwordField.classList.add('error-border');
                passwordField.focus();
                return false;
            }

            // Validate confirm password
            if (confirmPasswordField.value == '') {
                error.innerHTML = "Please enter your Confirm Password";
                confirmPasswordField.classList.add('error-border');
                confirmPasswordField.focus();
                return false;
            }

            // Validate that password and confirm password match
            if (passwordField.value != confirmPasswordField.value) {
                error.innerHTML = "Password and Confirm Password must be the same";
                confirmPasswordField.classList.add('error-border');
                confirmPasswordField.focus();
                return false;
            }

            return true;
        }
    </script>
</body>

</html>
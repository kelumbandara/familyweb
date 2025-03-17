<!--Website: wwww.codingdung.com-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CodingDung | Profile Template</title>
    <link rel="icon" type="image/png" href="./assets/images/images.png">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- ________________Boxicons________________ -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>


    <link rel="stylesheet" href="./adminPanel/assets/css/addBlog.css">


    <!-- Custom fonts for this template-->
    <link href="./adminPanel/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="./adminPanel/assets/css/sb-admin-2.min.css" rel="stylesheet">

    <style>
        .preview-image {
            width: 100px;
            height: 100px;
            object-fit: cover;
            margin: 5px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        #options-panel {
            margin-top: 10px;
        }

        @media (max-width: 768px) {
            .row_table_responsive {
                display: none;
            }
        }
    </style>
</head>

<body>
    <div class="container light-style flex-grow-1 container-p-y">
        <a href="./index.php" style="color: #000; font-size: 35px;" class="goBack"><i class='bx bx-arrow-back'><span
                    style="margin-left: 20px;">Go Back</span></i></a>
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
                        <a class="list-group-item list-group-item-action" data-toggle="list" href="#add-blogs">Add
                            Blogs</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#add-images-to-gallery">Add Images To library</a>

                        <!-- <a class="list-group-item list-group-item-action" data-toggle="list"
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
                                    <img src="#" id="newImg"
                                        onerror="this.src='./assets/images/Member images/<?php echo $row['image'] ?>'"
                                        class="d-block ui-w-80">
                                    <?php
                                    }else{
                                ?>
                                    <img src="#" id="newImg"
                                        onerror="this.src='./assets/images/Member images/avatar1.png'"
                                        class="d-block ui-w-80">
                                    <?php
                                }
                                ?>

                                    <div class="media-body ml-4">
                                        <label class="btn btn-outline-primary"> Upload new photo
                                            <input type="file" name="ImgFile" id="InpImg"
                                                class="account-settings-fileinput">
                                        </label>
                                        <!-- &nbsp; -->
                                        <button type="button" id="reset-btn" class="btn md-btn-flat">Reset</button>
                                    </div>
                                </div>

                                <script>
                                    document.getElementById("reset-btn").addEventListener("click", function () {
                                        // Reset the file input
                                        document.getElementById("InpImg").value = "";

                                        // Reset the image preview
                                        let defaultImg = "<?php echo $row['image'] ? './assets/images/Member images/' . $row['image'] : './assets/images/Member images/avatar1.png'; ?>";
                                        document.getElementById("newImg").src = defaultImg;
                                    });
                                </script>

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
                                    <div class="Updatebuttons">
                                        <input type="submit" name="update" class="update_button" value="Update">
                                        <button type="reset" class="update_cancel">Cancel</button>
                                    </div>

                                </div>
                            </form>

                            <script text="text/javascript">
                                // to prview image
                                InpImg.onchange = evt => {
                                    const [file] = InpImg.files
                                    if (file) {
                                        newImg.src = URL.createObjectURL(file)
                                    }
                                }
                            </script>

                            <?php
                            }
                            ?>

                        </div>


                        <!-- changing the password -->
                        <div class="tab-pane fade" id="account-change-password">
                            <?php
                                include 'backEnd/connection.php';
                                if (isset($_SESSION['UsName'])) {
                                    $user = $_SESSION["UsName"];
                                    $query = "SELECT * FROM register WHERE user_name='$user'";
                                    $result = mysqli_query($con, $query);
                                    $row2 = mysqli_fetch_assoc($result);

                                    // Check for 'editPasswordSuccess' parameter and set flag
                                    if (isset($_GET['editPasswordSuccess'])) {
                                        $showAlert = true;
                                    } else {
                                        $showAlert = false;
                                    }
                            ?>
                            <form action="./backEnd/proUpdate.php" method="post" id="passwordForm">
                                <div class="card-body pb-2">
                                    <div class="form-group">
                                        <label class="form-label">Current password</label>
                                        <input type="password" class="form-control" id="old_pass" name="oldPassword">
                                        <input type="hidden" class="form-control" id="hidden_pass" name="hidden_pass"
                                            value="<?php echo $row2["password"] ?>">
                                        <input type="hidden" class="form-control" name="hidden_id"
                                            value="<?php echo $row2["id"] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">New password</label>
                                        <input type="password" class="form-control" name="NewPssword" id="NewPssword">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Repeat new password</label>
                                        <input type="password" class="form-control" name="ComPassword" id="ComPassword">
                                    </div>

                                    <div class="Updatebuttons">
                                        <button type="submit" class="update_button" name="submitPassword">Save
                                            changes</button>&nbsp;
                                        <button type="button" class="update_cancel">Cancel</button>
                                    </div>
                                </div>
                            </form>

                            <script>
                                document.addEventListener("DOMContentLoaded", function () {
                                <?php if ($showAlert): ?>
                                        alert('Password has been updated successfully!');
                                <?php endif; ?>

                                const form = document.getElementById("passwordForm");

                                    form.addEventListener("submit", function (event) {
                                        const oldPass = document.getElementById("old_pass").value.trim();
                                        const newPassword = document.getElementById("NewPssword").value.trim();
                                        const confirmPassword = document.getElementById("ComPassword").value.trim();

                                        if (oldPass === "") {
                                            alert("The Old password must not be empty!");
                                            event.preventDefault();
                                        } else if (newPassword === "") {
                                            alert("New password cannot be empty!");
                                            event.preventDefault();
                                        } else if (newPassword !== confirmPassword) {
                                            alert("New password and Confirm password do not match!");
                                            event.preventDefault();
                                        } else if (newPassword === oldPass) {
                                            alert("New password and old password should not be the same!");
                                            event.preventDefault();
                                        }
                                    });
                                });

                            </script>

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
                                        <input type="date" class="form-control" name="age"
                                            value="<?php echo $row['age']?>">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Country</label>
                                        <input type="text" class="form-control" name="country"
                                            value="<?php echo $row['country']?>">
                                    </div>
                                </div>
                                <hr class="border-light m-0">
                                <div class="card-body pb-2">
                                    <h6 class="mb-4">Contacts</h6>
                                    <div class="form-group">
                                        <label class="form-label">Phone</label>
                                        <input type="text" class="form-control" name="contact"
                                            value="<?php echo $row['contact']?>">

                                    </div>
                                    <div class="Updatebuttons">
                                        <input type="submit" name="bio" class="update_button"
                                            value="Submit Changes">&nbsp;
                                        <button type="button" class="update_cancel">Cancel</button>
                                    </div>
                                </div>
                            </form>

                            <?php
                            }
                            ?>
                        </div>
                        <div class="tab-pane fade" id="add-blogs">
                            <form action="./adminPanel/include/blogAddBack.php" method="post"
                                enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-lg-6 mb-4">
                                        <div class="container_drop">
                                            <!-- Drag & Drop Area -->
                                            <div class="drop-area">
                                                <i class='bx bxs-cloud-upload icon'></i>
                                                <h3>Drag and drop or click here to select images</h3>
                                                <p>Image size must be less than <span>2MB</span></p>
                                                <input type="file" name="head_img" accept="image/*" id="input-file"
                                                    hidden multiple>
                                            </div>

                                            <!-- Clear Button Area (Initially Hidden) -->
                                            <div class="clear-area">
                                                <a id="clear-btn" class="clear-btn" style="display: none;">Clear
                                                    Images</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-4">
                                        <div class="form-container">
                                            <div class="form-group">
                                                <label for="title">Title</label>
                                                <input type="text" id="title" name="title">
                                            </div>

                                            <div class="form-group">
                                                <label for="author">Author</label>
                                                <input type="text" id="author" name="author">
                                            </div>

                                            <div class="form-group">
                                                <label for="category">Category</label>
                                                <select id="category" name="category">
                                                    <option value="blog">Blog</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="content">Content</label>
                                                <textarea id="content" name="content" rows="5"></textarea>
                                            </div>


                                            <button type="submit" name="emaployee_add_blog">Submit</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="container_img">
                                        <!-- File input for image selection -->
                                        <input type="file" id="file-input" name="blog_images[]" multiple
                                            accept="image/png, image/jpeg" onchange="preview()">
                                        <label class="label_photo" for="file-input">
                                            <i class="fas fa-upload"></i> &nbsp; Choose A Photo
                                        </label>

                                        <button id="clear-btn2" type="button" onclick="clearImages()">Clear</button>

                                        <p id="num-of-files">No Files Chosen</p>

                                        <!-- Image Preview Container -->
                                        <div id="images" class="image-preview-container"></div>
                                    </div>
                                </div>
                            </form>

                            <div class="row row_table_responsive">
                                <div class="container-fluid">

                                    <!-- DataTales Example -->
                                    <div class="card shadow mb-4">
                                        <div class="card-header py-3">
                                            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-bordered" id="dataTable" width="100%"
                                                    cellspacing="0">
                                                    <thead>
                                                        <tr>
                                                            <th>Blog Head Image</th>
                                                            <th>Blog Title</th>
                                                            <th>Blog Date</th>
                                                            <th>Content</th>
                                                            <th>Author</th>
                                                            <th>Category</th>
                                                            <th>Delete</th>
                                                            <th>Update</th>
                                                        </tr>
                                                    </thead>

                                                    <tbody>
                                                        <?php
                                                    include './backEnd/connection.php';

                                                    $sql = "SELECT * FROM blogs";
                                                    $result = mysqli_query($con, $sql);
                                                    $count = 0;
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                        $count++;
                                                ?>
                                                        <tr>
                                                            <td class="tb_data">
                                                                <img class="table_image" style="width: 100px;"
                                                                    src="./adminPanel/assets/blogImages/blogTitle/<?php echo htmlspecialchars($row['image']); ?>">
                                                            </td>

                                                            <td>
                                                                <?php echo htmlspecialchars($row['heading']); ?>
                                                            </td>

                                                            <td>
                                                                <?php echo htmlspecialchars($row['date']); ?>
                                                            </td>

                                                            <td>
                                                                <?php
                                                                    $content = $row['content']; // Get the content
                                                                    $words = explode(' ', $content); // Split content into words
                                                                    $shortContent = implode(' ', array_slice($words, 0, 20)); // Get the first 20 words
                                                                    echo htmlspecialchars($shortContent); // Display the shortened content
                                                                ?>
                                                            </td>

                                                            <td>
                                                                <?php echo htmlspecialchars($row['Author']); ?>
                                                            </td>

                                                            <td>
                                                                <?php echo htmlspecialchars($row['Category']); ?>
                                                            </td>

                                                            <td>
                                                                <a class="table_delete_btn"
                                                                    href="./adminPanel/include/blogAddBack.php?blog_delete_emp=<?php echo $row['id']; ?>">Delete</a>
                                                            </td>

                                                            <td style="width: 1050px !important;">
                                                                <a class="table_delete_btn" href="#" data-toggle="modal"
                                                                    data-target="#UpdateModal-<?php echo $row['id']; ?>">Edit
                                                                    More</a>
                                                            </td>
                                                            <form action="./adminPanel/include/blogAddBack.php"
                                                                method="POST" enctype="multipart/form-data">
                                                                <div class="modal fade"
                                                                    id="UpdateModal-<?php echo $row['id']; ?>"
                                                                    tabindex="-1" role="dialog"
                                                                    aria-labelledby="exampleModalLabel"
                                                                    aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title"
                                                                                    id="exampleModalLabel">Already want
                                                                                    to Update?</h5>
                                                                            </div>

                                                                            <div class="modal-body">
                                                                        <div class="container-drop">
                                                                            <!-- Drag & Drop Area -->
                                                                            <div class="drag-drop-area" id="drag-drop-area-<?php echo $row['id']; ?>">
                                                                                <i class="bx bxs-cloud-upload icon"></i>
                                                                                <h3>Drag and drop or click here to select images</h3>
                                                                                <p>Image size must be less than <span>2MB</span></p>
                                                                                <input type="file" name="head_img" accept="image/*" id="input-file-<?php echo $row['id']; ?>" hidden multiple>
                                                                            </div>

                                                                            <div class="clear-image-area">
                                                                                <a href="#" id="clear-image-btn-<?php echo $row['id']; ?>" class="clear-image-btn" style="display: none;">Clear Image</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>


                                                                            <div class="form-container">
                                                                                <div class="form-group">
                                                                                    <label for="title">Title</label>
                                                                                    <input type="hidden"
                                                                                        name="blog_up_id"
                                                                                        value="<?php echo $row['id']; ?>">
                                                                                    <input type="text" name="title"
                                                                                        value="<?php echo htmlspecialchars($row['heading']); ?>">
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <label for="author">Author</label>
                                                                                    <input type="text" name="author"
                                                                                        value="<?php echo htmlspecialchars($row['Author']); ?>">
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <label
                                                                                        for="category">Category</label>

                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <label for="content">Content</label>
                                                                                    <textarea name="content"
                                                                                        rows="5"><?php echo htmlspecialchars($row['content']); ?></textarea>
                                                                                </div>
                                                                            </div>

                                                                            <div class="modal-footer">
                                                                                <button class="btn btn-secondary"
                                                                                    type="button"
                                                                                    data-dismiss="modal">Cancel</button>
                                                                                <button type="submit"
                                                                                    class="btn btn-primary"
                                                                                    name="update_blog_emp">Update</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </tr>
                                                        <?php
        }
    ?>
                                                    </tbody>

                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="add-images-to-gallery">
                            <div class="row-new">
                                <div class="container-img-new">
                                    <!-- File input for image selection -->
                                    <form id="image-form-new" action="./adminPanel/include/imageGalleryBack.php"
                                        method="POST" enctype="multipart/form-data">
                                        <input type="file" id="file-input-new" name="images[]" multiple
                                            accept="image/png, image/jpeg" onchange="previewNew()">
                                        <label class="label-photo-new" for="file-input-new">
                                            <i class="fas fa-upload"></i> &nbsp; Choose A Photo
                                        </label>

                                        <p id="num-of-files-new">No Files Chosen</p>

                                        <!-- Image Preview Container -->
                                        <div id="images-new"></div>

                                        <!-- Options Panel (Initially Hidden) -->
                                        <div id="options-panel-new" style="display: none;">
                                            <label for="category-select-new">Select Category:</label>
                                            <select id="category-select-new" name="category">
                                                <option value="family">Family</option>
                                                <option value="office">Office</option>
                                            </select>
                                        </div>

                                        <button type="submit" name="emplayee_img_submit" id="submit-btn-new"
                                            class="btn btn-primary" style="display: none;">Submit</button>
                                    </form>
                                    <button id="clear-btn-new" onclick="clearImagesNew()"
                                        style="display: none;">Clear</button>
                                </div>
                            </div>
                            <div class="row row_table_responsive">
                                <div class="container-fluid">

                                    <!-- DataTales Example -->
                                    <div class="card shadow mb-4">
                                        <div class="card-header py-3">
                                            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-bordered" id="dataTable" width="100%"
                                                    cellspacing="0">
                                                    <thead>
                                                        <tr>
                                                            <th>Image</th>
                                                            <th>Category</th>
                                                            <th>Edit</th>
                                                        </tr>
                                                    </thead>

                                                    <tbody>
    <?php
    include './backEnd/connection.php';

    // Ensure the query was executed successfully
    $sql = "SELECT * FROM image_gallery";
    $result = mysqli_query($con, $sql);
    if (!$result) {
        echo "Error executing query: " . mysqli_error($con);
        exit;
    }

    while ($row = mysqli_fetch_assoc($result)) {
        $image_name = $row['image'];
        $image_name = str_replace('__', ' (', $image_name);
        $image_name = str_replace('_', ')', $image_name);

        ?>
        <tr>
            <td class="tb_data">
                <!-- Fixed image path with normalized filename -->
                <img class="table_image" src="./adminPanel/assets/imagesLibrary/<?php echo htmlspecialchars($image_name); ?>" alt="Image">
            </td>
            <td>
                <?php echo htmlspecialchars($row['category']); ?>
            </td>
            <td>
                <a class="table_delete_btn" href="./adminPanel/include/imageGalleryBack.php?img_id_emp=<?php echo $row['id']; ?>">
                    Delete
                </a>
            </td>
        </tr>
    <?php
    }
    ?>
</tbody>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>


    </div>
    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.1.1/crypto-js.min.js"></script>

    <script src="./adminPanel/assets/js/demo/datatables-demo.js"></script>

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
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Get the hash from the URL (e.g., #add-images-to-gallery)
            var hash = window.location.hash;

            if (hash) {
                // Activate the corresponding tab
                var tabLink = document.querySelector('a[href="' + hash + '"]');
                if (tabLink) {
                    tabLink.click(); // Simulate a click to activate the tab
                }
            }
        });
    </script>

    <script src="./adminPanel/assets/js/submit_multipleImg.js"></script>


    <script src="./adminPanel/assets/js/script.js"></script>

    <script src="./adminPanel/assets/js/addBlog_multiimg.js"></script>

    <script src="./adminPanel/assets/js/image_drag.js"></script>



</body>

</html>
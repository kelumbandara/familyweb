<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- ________________Login CSS________________ -->
    <link rel="stylesheet" href="assets/css/loginregister.css">

    <!-- ________________Boxicons________________ -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!-- ________________Font Awesome icons________________ -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

</head>

<body>


    <div class="container">
        <div class="form_box login">
            <form action="backEnd/loginback.php" method="post">
                <h1>Login</h1>
                <div class="input_box">
                    <input type="text" placeholder="login_Username" >
                    <i class='bx bxs-user'></i>
                </div>
                <div class="input_box">
                    <input type="password" placeholder="login_Password" >
                    <i class='bx bx-lock-alt' ></i>
                </div>
                <div class="frogot_link">
                    <a href="#">Frogot Password</a>
                </div>
                <button type="submit" name="login" class="btn">Login</button>
                <p>or login with social platforms</p>
                <div class="social_icons">
                    <a href="#"><i class='bx bxl-google' ></i></a>
                    <a href="#"><i class='bx bxl-facebook-circle' ></i></a>
                    <a href="#"><i class='bx bxl-linkedin-square' ></i></a>
                    <a href="#"><i class='bx bxl-github'></i></a>
                </div>
            </form>
        </div>

        <div class="form_box register">
            <form action="backEnd/register.php" method="post">
                <h1>Registration</h1>
                <div class="input_box">
                    <input type="text" placeholder="Username" name="regi_Username">
                    <i class='bx bxs-user'></i>
                </div>
                <div class="input_box">
                    <input type="email" placeholder="Useremail" name="regi_UserEmail">
                    <i class='bx bxl-gmail'></i>
                </div>
                <div class="input_box">
                    <input type="password" placeholder="Password" name="regi_Password">
                    <i class='bx bx-lock-alt' ></i>
                </div>
                
                <button type="submit" class="btn" name="register">Rgister</button>
                <p>or Register with social platforms</p>
                <div class="social_icons">
                    <a href="#"><i class='bx bxl-google' ></i></a>
                    <a href="#"><i class='bx bxl-facebook-circle' ></i></a>
                    <a href="#"><i class='bx bxl-linkedin-square' ></i></a>
                    <a href="#"><i class='bx bxl-github'></i></a>
                </div>
            </form>
        </div>

        <div class="toggle_box">
            <div class="toggle_panel toggle_left">
                <h1>Hello, Welcome!</h1>
                <p>Don't have an account?</p>
                <button class="btn register_btn">Register</button>
            </div>
            <div class="toggle_panel toggle_right">
                <h1>Welcome Back!</h1>
                <p>Already have an account?</p>
                <button class="btn login_btn">Login</button>
            </div>
        </div>
    </div>

    <script src="assets/js/login.js"></script>
</body>

</html>
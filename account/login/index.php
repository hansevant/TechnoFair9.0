<?php
session_start();

if (isset($_SESSION['username']) > 0) {
    header('Location: ../../has_login/leader');
}

?>



<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->


<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <!---<title> Responsive Registration Form | CodingLab </title>--->

    <!--Bootsrap 4 CDN-->
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css" crossorigin="anonymous">

    <link rel="stylesheet" href="../assets/regis.css">
    <title>Login</title>
    <link href="../../assets/img/logo/logo.png" rel="icon">
    <link href="../../assets/img/logo/logo.png" rel="apple-touch-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <div class="container">
        <div class="title">Login</div>
        <div class="content">
            <form action="../config/login.php" method="post">
                <div class="user-details">
                    <div class="input-box">
                        <span class="details">Username</span>
                        <input name="username" type="text" placeholder="Username" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Password</span>
                        <input name="password" type="password" placeholder="Password" required>
                    </div>
                </div>

                <div class="button">
                    <input name="submit" type="submit" value="Login">
                </div>
            </form>
            <div class="d-flex justify-content-center">
                I have an account
            </div>
            <div class="d-flex justify-content-center">
                <a class="mx-1" href="../register/">Register</a> | <a class="mx-1" href="../../">Home</a>
            </div>
        </div>
    </div>
    </div>

</body>

</html>
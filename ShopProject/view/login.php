<?php
if (!isset($_SESSION))
    session_start();

if (isset($_SESSION["user"]))
    header("Location: index.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop - Login Page</title>
    <link rel="icon" type="image/png" href="media/logo.png">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">

    <script type="text/javascript" src="js/utils/jquery.min.js"></script>
    <script type="module" src="js/login.js"></script>
</head>

<body class="bg-custom1">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 col-sm-8 py-4 my-4">
                <div class="col-12 d-flex justify-content-center">
                    <img class="card-img-top login-logo" src="media/logo.png" alt="Shop App logo">
                </div>
                <div class="card mt-5 border-custom1 login-card">
                    <div class="card-header bg-custom2" style="border-radius: 0;">
                        <h3 class="text-center color-custom1">Login</h3>
                    </div>
                    <div class="card-body bg-custom3">
                        <form id="login">
                            <div class="form-group">
                                <label for="username" class="color-custom2">Username</label>
                                <input type="text" id="username" class="form-control input"
                                    placeholder="Enter your username or email" required name="username_email"
                                    autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="password" class="color-custom2">Password</label>
                                <input type="password" id="password" class="form-control input"
                                    placeholder="Enter your password" required name="password" autocomplete="off">
                            </div>
                            <p id="message" class="color-custom3"></p>
                            <br>
                            <button type="submit" class="btn btn-primary btn-block login mt-2">Login</button>
                        </form>
                    </div>
                </div>
                <p class="mt-3 color-custom2 px-4">You do not have an account? <a class="link-custom1"
                        href="signup.php"><strong>Signup</strong></a></p>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="js/utils/bootstrap.min.js"></script>
</body>

</html>
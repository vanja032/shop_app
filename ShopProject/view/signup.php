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
    <title>Shop - Signup Page</title>
    <link rel="icon" type="image/png" href="media/logo.png">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">

    <script type="text/javascript" src="js/utils/jquery.min.js"></script>
    <script type="module" src="js/register.js"></script>
</head>

<body class="bg-custom1">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-12 col-sm-12">
                <div class="card mt-5 border-custom1">
                    <div class="card-header bg-custom2" style="border-radius: 0;">
                        <h3 class="text-center color-custom1">Signup</h3>
                    </div>
                    <div class="card-body bg-custom3">
                        <form id="signup">
                            <div class="row">
                                <div class="col-sm-12 col-md-6 form-group">
                                    <label for="f_name" class="color-custom2">First Name</label>
                                    <input type="text" id="f_name" class="form-control input color-custom1"
                                        placeholder="Enter your first name" required name="f_name" autocomplete="off">
                                </div>
                                <div class="col-sm-12 col-md-6 form-group">
                                    <label for="l_name" class="color-custom2">Last Name</label>
                                    <input type="text" id="l_name" class="form-control input color-custom1"
                                        placeholder="Enter your last name" required name="l_name" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email" class="color-custom2">Email</label>
                                <input type="email" id="email" class="form-control input" placeholder="Enter your email"
                                    required name="email" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="username" class="color-custom2">Username</label>
                                <input type="text" id="username" class="form-control input color-custom1"
                                    placeholder="Enter your username" required name="username" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="password" class="color-custom2">Password</label>
                                <input type="password" id="password" class="form-control input"
                                    placeholder="Enter your password" required name="password" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="r_password" class="color-custom2">Repeat Password</label>
                                <input type="password" id="r_password" class="form-control input"
                                    placeholder="Repeat your password" required name="r_password" autocomplete="off">
                            </div>
                            <p class="color-custom3" id="message"></p>
                            <br>
                            <button type="submit" class="btn btn-primary btn-block login mt-2">Signup</button>
                        </form>
                    </div>
                </div>
                <p class="mt-3 color-custom2 px-4">You already have an account? <a class="link-custom1"
                        href="login.php"><strong>Login</strong></a></p>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="js/utils/bootstrap.min.js"></script>
</body>

</html>
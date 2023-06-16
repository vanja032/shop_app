<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop - Login Page</title>
    <link rel="icon" type="image/png" href="media/logo.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="bg-custom1">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 col-sm-8">
                <div class="card mt-5 border-custom1">
                    <div class="card-header bg-custom2" style="border-radius: 0;">
                        <h3 class="text-center color-custom1">Login</h3>
                    </div>
                    <div class="card-body bg-custom3">
                        <form>
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
                            <p class="color-custom3">Message</p>
                            <button type="submit" class="btn btn-primary btn-block login mt-3">Login</button>
                        </form>
                    </div>
                </div>
                <p class="mt-3 color-custom2 px-4">You do not have an account? <a class="link-custom1"
                        href="signup.php">Signup</a></p>
            </div>
        </div>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>

</html>
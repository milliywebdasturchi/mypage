<?php

session_start();

if(isset($_SESSION['username'])) {
    header("Location: index");
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="<?php echo $_SERVER['HTTP_HOST']; ?>/assets/css/bootstrap.min.css">
</head>
<body class="bg-light">
    
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-sm-5">
            <div class="card">
                <div class="card-body">
                    <h3 class="text-center">Sign In Account</h3>
                    <hr>
                    <form action="inc/login.inc.php" method="post" autocomplete="off">
                        <div class="form-group">
                            <input type="text" name="username" class="form-control" placeholder="Enter username" required>
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" placeholder="Enter password" required>
                        </div>
                        <button type="submit" name="login" class="btn btn-primary btn-block">Sign In</button>
                    </form>
                    <hr>
                    <p>Have your account? <a href="register" class="link">Sign Up</a></p>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo $_SERVER['HTTP_HOST']; ?>/assets/js/jquery.slim.min.js"></script>
<script src="<?php echo $_SERVER['HTTP_HOST']; ?>/assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php

session_start();

if(isset($_SESSION['username'])) {
    header("Location: index");
    exit;
}

if(isset($_GET['error'])) {
    $error = $_GET['error'];
    switch ($error) {
        case 'emptyUsername':
            $error = "Username maydoni to'ldirilmadi.";
            break;

        case 'emptyPassword':
            $error = "Password maydoni to'ldirilmadi.";
            break;

        case 'matchUsername':
            $error = "Username maydoni faqat a-z belgilardan iborat bo'lishi kerak.";
            break;

        case 'errorPassword':
            $error = "Password va Confirm password maydonlariga bir xil parol kiritilmadi.";
            break;

        case 'alreadyUser':
            $error = "Bu foydalanuvchi tizimdan avval ro'yxatdan o'tgan.";
            break;

        case 'insertUser':
            $error = "Ro'yxatdan o'tishda xatolik!";
            break;

        default:
            $error = "";
            break;
    }
}

if(isset($_GET['success'])) {
    $success = $_GET['success'];
    switch ($success) {
        case 'insertUser':
            $success = "Ro'yxatdan o'tish muvaffaqiyatli yakunlandi. Endi tizimga kirishingiz mumkin.";
            break;

        default:
            $success = "";
            break;
    }
    if(isset($_SESSION['newUsername'])) {
        $newUsername = $_SESSION['newUsername'];
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ro'yxatdan o'tish</title>
    <link rel="stylesheet" href="<?php echo $_SERVER['HTTP_HOST']; ?>/assets/css/bootstrap.min.css">
</head>
<body class="bg-light">
    
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-sm-5">
            <div class="card">
                <div class="card-body">
                    <h3 class="text-center">Ro'yxatdan o'tish</h3>
                    <hr>
                    <?php if(isset($_GET['error'])) { echo "<div class='alert alert-danger'>" . $error . "</div>"; } ?>
                    <?php 
                        if(isset($_GET['success'])) { 
                            echo "<div class='alert alert-success'>" .
                            $success . "</div>";
                        } 
                    ?>
                    <form action="inc/register.inc.php" method="post" autocomplete="off">
                        <div class="form-group">
                            <input type="text" name="username" class="form-control" placeholder="Taxallus">
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" placeholder="Parol">
                        </div>
                        <div class="form-group">
                            <input type="password" name="cpassword" class="form-control" placeholder="Parolni tasdiqlang">
                        </div>
                        <button type="submit" name="register" class="btn btn-primary btn-block">Yakunlash</button>
                    </form>
                    <hr>
                    <p>Siz avval ro'yxatdan o'tganmisiz? <a href="login" class="link">Tizimga kiring</a></p> 
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo $_SERVER['HTTP_HOST']; ?>/assets/js/jquery.slim.min.js"></script>
<script src="<?php echo $_SERVER['HTTP_HOST']; ?>/assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
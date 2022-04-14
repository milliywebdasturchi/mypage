<?php

include __DIR__ . "/db_config.php";

session_start();

if(!isset($_SESSION['username'])) {
    header("Location: login");
    exit;
}

function getArray($data) {
    echo "<pre>";
    print_r($data);
    echo "</pre>";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="<?php echo $_SERVER['HTTP_HOST']; ?>/assets/css/bootstrap.min.css">
</head>
<body class="bg-light">
    
<div class="container">
    <div class="row mt-3">
        <div class="col-sm-3">
            <div class="card">
                <div class="card-header">My Profile</div>
                <div class="card-body">
                    <h3>Hello, <?php echo $_SESSION['username']; ?></h3>
                    <p><a href="logout" class="link">Logout</a></p>
                </div>
            </div>
        </div>
        <div class="col-sm-9">
            <div class="card">
                <div class="card-body">
                    <form action="inc/addpost.php" method="post">
                        <div class="form-group">
                            <textarea name="content" cols="30" rows="5" class="form-control" placeholder="Enter text post..." required></textarea>
                        </div>
                        <input type="hidden" name="userId" value="<?php echo $_SESSION['id']; ?>">
                        <button type="submit" name="addpost" class="btn btn-primary">Post</button>
                    </form>
                </div>
            </div>
            <hr>
            <div class="card">
                <div class="card-body">
                    <h1>My posts</h1>
                    <hr>
                    <?php 
                        $result = $conn->query("SELECT * FROM posts WHERE user_id = '$_SESSION[id]' ORDER BY id DESC");                        
                        while ($row = $result->fetch_assoc()) {
                            echo "<p class='alert alert-secondary'>" . $row['content'] . "<br><br><i>" . $row['createdAt'] . "</i></p>";
                            echo "<p><a href='delete_post.php?id={$row['id']}' class='badge badge-danger'>delete</a></p>";
                            echo "<hr>";
                        }
                        
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo $_SERVER['HTTP_HOST']; ?>/assets/js/jquery.slim.min.js"></script>
<script src="<?php echo $_SERVER['HTTP_HOST']; ?>/assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
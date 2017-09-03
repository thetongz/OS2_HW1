<html>
<?php
    require "../controllers/user.controller.php";
    require "../utilities/redirect.php";

    if(isset($_SESSION['username'])) {
        redirect("home");
    }

    function isLoginSuccess($loginStatus) {
        if($loginStatus) {
            redirect("home");
        } else {
            echo "<script>alert('Username or Password is invalid')</script>";
        }
    }

    if (isset($_POST['username']) && isset($_POST['password'])) {
        $loginStatus = signIn($_POST['username'], $_POST['password']);
        isLoginSuccess($loginStatus);
    }
?>
<head>
    <title>Tea Time Shop</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="static/fontawesome/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="static/style/bootstrap.min.css">
    <script src="static/javascript/jquery.min.js"></script>
    <script src="static/javascript/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="home">Tea Time</a>
        </div>
        <div>
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="product">Product</a>
                </li>
                <li class="active">
                    <a href="#">Sign in</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="container">
    <div class="col-md-6 col-md-offset-3">
        <form action="" method="POST">
            <h1>Sign in</h1>
            <p>with your Tea Time Account</p>
            <div class="form-group">
                <label class="control-label" for="username">Username</label>
                <input name="username" class="form-control" id="username" type="text" placeholder="username">
            </div>

            <div class="form-group">
                <label class="control-label" for="password">Password</label>
                <input name="password" class="form-control" id="password" type="password" placeholder="password">
            </div>
            <button type="submit" class="btn btn-primary btn-block">Sign in</button>
        </form>
    </div>
</div>
</body>
</html>
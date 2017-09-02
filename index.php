<html>
<?php
    session_start();
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
                <?php
                    if(isset($_SESSION['username'])) {
                        echo '<li><a href="add">Add product</a></li>';
                    }
                ?>
                <li><a href="product">Product</a></li>
                <?php
                    if(!isset($_SESSION['username'])) {
                        echo '<li><a href="signin">Sign in</a></li>';
                    } else {
                        echo '<li><a href="signout">Sign out</a></li>';
                    }
                ?>
            </ul>
        </div>
    </div>
</nav>
<div class="container">
    <div class="jumbotron">
        <h1>Tea Time <i class="fa fa-coffee" aria-hidden="true"></i></h1>
        <p>A cup of <b><i>TEA</i></b> make everything <b><i>BETTER</i></b></p>
        <p><a href="product" class="btn btn-primary btn-lg">View our product</a></p>
    </div>
</div>
</body>
</html>
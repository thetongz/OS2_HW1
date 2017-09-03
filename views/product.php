<html>
<?php
session_start();

require "../controllers/product.controller.php";

$products = getAllProduct();

?>
<head>
    <title>Tea Time Shop</title>
    <meta charset="UTF-8">
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
                if (isset($_SESSION['username'])) {
                    echo '<li><a href="add">Add product</a></li>';
                }
                ?>
                <li class="active">
                    <a href="#">Product</a>
                </li>
                <?php
                if (!isset($_SESSION['username'])) {
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
    <div>
        <h1>*** items found</h1>
        <table class="table table-striped table-hover ">
            <thead>
            <tr>
                <th width="5%">#</th>
                <th width="20%">Image</th>
                <th width="15%">Name</th>
                <th width="33%">Description</th>
                <th width="10%">Price</th>
                <th width="10%">Amount</th>
                <th width="7%">Other</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <?php
                    foreach($products as $product) {
                        echo '
                            <td>'. $product["id"]. '</td>
                            <td>
                                <img src="'. $product["imageURL"].'" width="160px" height="160px">
                            </td>
                            <td>'. $product["name"]. '</td>
                            <td>'. $product["description"]. '</td>
                            <td>'. $product["price"]. '</td>
                            <td>'. $product["amount"]. '</td>
                            <td>';

                        if (isset($_SESSION['username'])) {
                            echo '<i class="fa fa-pencil fa-2x" aria-hidden="true"></i>
                                        &nbsp;
                                  <i class="fa fa-trash-o fa-2x" aria-hidden="true"></i>';
                        }

                        echo '</td>';
                    }
                ?>
            </tr>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
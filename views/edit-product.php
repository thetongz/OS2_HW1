<html>
<?php
    session_start();
    require "../controllers/product.controller.php";
    require "../utilities/redirect.utility.php";

    $productController = new ProductController();

    if(!isset($_SESSION['username'])) {
        redirect("../home");
    }

    if($_GET['productID']) {
        $productId = $_GET['productID'];
        $product = $productController->getProductByID($productId);
        if($product == null) {
            redirect("../product");
        }
    } else {
        redirect("../product");
    }
?>
<head>
    <title>Tea Time Shop</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../static/fontawesome/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../static/style/bootstrap.min.css">
    <script src="../static/javascript/jquery.min.js"></script>
    <script src="../static/javascript/bootstrap.min.js"></script>
    <style>
        #previewImage {
            width: 220px;
            height: 220px;
        }

        #form {
            padding-bottom: 50px;
        }
    </style>
    <script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#previewImage').attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
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
                    <a href="add">Add product</a>
                </li>
                <li>
                    <a href="product">Product</a>
                </li>
                <li>
                    <a href="signout">Sign out</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="container">
    <div class="col-md-8 col-md-offset-2" id="form">
        <h1>Edit Product</h1>
        <div class="form-group">
            <img id="previewImage" src='<?php echo $product["imageURL"] ?>' alt="your image"/>
            <input type='file' onchange="readURL(this);"/>
        </div>

        <div class="form-group">
            <label class="control-label" for="name">Name</label>
            <input class="form-control" id="name" type="text" placeholder="name"
                   value="<?php echo $product["name"] ?>">
        </div>

        <div class="form-group">
            <label for="textArea" class="control-label">Description</label>
            <textarea class="form-control" rows="3" id="textArea" style="resize:none"><?php echo $product["description"] ?></textarea>
        </div>

        <div class="form-group">
            <label class="control-label" for="price">Price</label>
            <input class="form-control" id="price" type="text" placeholder="price"
                   value="<?php echo $product["price"] ?>">
        </div>

        <div class="form-group">
            <label class="control-label" for="amount">Amount</label>
            <input class="form-control" id="amount" type="text" placeholder="amount"
                   value="<?php echo $product["amount"] ?>">
        </div>
        <a href="#" class="btn btn-primary btn-block">Edit product</a>
    </div>
</div>
</body>
</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gauree</title>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/animate.css">
    <link rel="stylesheet" href="../css/index.css">
    <style>
        .btn-dark{
    background-color: #B762C1!important;
    color: white;
    font-size: large;
}
</style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand logo" href="#">Gauree</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto nav_item">
                    <li class="nav-item active btn" style="margin: 5px">
                        <a class="nav-link text-light" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item btn" style="margin: 5px">
                        <a class="nav-link text-light" href="admin_login.php">Admin Login</a>
                    </li>
                    <li class="nav-item btn" style="margin: 5px">
                        <a class="nav-link text-light" href="#">Customer - Login/Sign up</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="product container">
        <h1 class="mt-3" style="color: #8946A6">Our Product</h1>
        <?php
        include_once('database.php');
        if ($connect) {
            $product = "SELECT * from product_info";
            $res = mysqli_query($connect, $product);
        ?>
            <div class="card-columns">
                <?php
                while ($row = mysqli_fetch_assoc($res)) :
                ?>
                    <div class="card mt-4 text-center" style="width: 20rem; border-color:#8946A6">
                        <img class="card-img-top" src="../user_image/<?php echo $row['image']; ?>" style="width: 20rem;height: 20rem;" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title text-center font-weight-bold" style="color: #B762C1"><?php echo $row['proName']; ?></h5>
                            <h6 class="card-title font-weight-bold"><span style="color: #EA99D5">Price: </span><?php echo $row['price']; ?> Tk</h6>
                            <?php
                            if ($row['piece'] != 0) {
                            ?>
                                <div class="card-title ">

                                    <p class="text-muted font-weight-bold"><span class="text-secondary">Available: </span><?php echo $row['piece']; ?></p>
                                </div>
                                <a href="#" class="btn btn-dark login_btn text-center">Add to cart</a>

                        </div>
                    </div>
                <?php
                            } else { ?>
                    <div class="card-title ">

                        <p class="text-muted font-weight-bold"><span class="text-secondary">Sorry</p>
                    </div>
                    <a href="#" class="btn btn-dark login_btn text-center disabled">Out of stock</a>
                <?php
                            }
                ?>
            <?php endwhile; ?>
            </div>
        <?php
        }
        ?>
    </div>

    <script src="../js/jquery-3.5.1.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="../js/wow.js"></script>
    <script>
        new WOW.init();
    </script>
    <script src="../js/main.js"></script>
</body>

</html>
<?php
session_start();
include_once('database.php');
if ($connect) {
    if (isset($_POST['upload'])) {
        $proTitle = $_POST['proTitle'];
        $proType = $_POST['proType'];
        $Price = $_POST['Price'];
        $Piece = $_POST['Piece'];
        $image = time() . '_' . $_FILES['image']['name'];
        $target = '../user_image/' . $image;
        $sqlFind = "Select * from product_info where proName='$proTitle'";
        $resultFind = mysqli_query($connect, $sqlFind);
        if (mysqli_num_rows($resultFind) > 0) {
            echo '<script>alert("This Product is already uploaded.")</script>';
        } else {
            $input = "INSERT INTO product_info(proName,proType,price,piece,`image`)	
                VALUES('$proTitle','$proType','$Price','$Piece','$image')";
            $result = mysqli_query($connect, $input);
            if ($result) {
                move_uploaded_file($_FILES['image']['tmp_name'], $target);
                header('location:product_table.php');
            } else {
                echo '<script>alert("Please enter your information once again.")</script>';
            }
        }
    }
}
?>


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
    <link rel="stylesheet" href="../css/customer_signup.css">
    <style>
        .signup {
            box-shadow: 0px 0px 20px #000;
            -webkit-box-shadow: 0px 0px 20px #000;
            -moz-box-shadow: 0px 0px 20px #000;
        }
    </style>
</head>

<body style="background-image: url(../media/neckpiece.jpg);">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand logo" href="#">Gauree</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active bg-info" style="margin: 5px">
                        <a class="nav-link text-light" href="index.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item bg-info" style="margin: 5px">
                        <a class="nav-link text-light" href="admin_login.php">Admin Login</a>
                    </li>
                    <li class="nav-item bg-info" style="margin: 5px">
                        <a class="nav-link text-light" href="customer_login.php">Customer - Login/Sign up</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container signup bg-transparent font-weight-bold" style="margin: 15vh auto; background-color: white; color: #8946A6;">
        <form method="post" action="" enctype="multipart/form-data">
            <div class="form-group">
                <label for="inputName">Product Title</label>
                <input type="text" class="form-control" id="inputName" name="proTitle">
            </div>
            <div class="form-group">
                <label for="inputName">Product Type</label>
                <input type="text" class="form-control" id="inputName" name="proType">
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputPrice">Price</label>
                    <input type="text" class="form-control" id="inputPrice" name="Price">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputNumber">Piece</label>
                    <input type="number" class="form-control" id="inputNumber" name="Piece" min="1" max="50">
                </div>
            </div>
            <label for="custome-file">Upload image of product</label>
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="customFile" name="image">
                <label class="custom-file-label" for="customFile">Choose file</label>
            </div>
            <button type="submit" class="btn mt-2" style="background-color:#8946A6; color: white;" name="upload">Upload</button>
        </form>
    </div>

    <script src="../js/jquery-3.5.1.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="../js/wow.js"></script>
    <script>
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
    </script>
    <script>
        new WOW.init();
    </script>
    <script src="../js/main.js"></script>
</body>

</html>
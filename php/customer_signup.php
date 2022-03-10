<?php
    session_start();
    include_once('database.php');
    if($connect){
        if(isset($_POST['signup'])){
            $CustomerName=$_POST['CustomerName'];
            $Email=$_POST['Email'];
            $Password=$_POST['Password'];
            $Address=$_POST['Address'];
            $PhoneNumber=$_POST['PhoneNumber'];
            $sqlFind="Select * from customer_info where Email='$Email'";
            $resultFind=mysqli_query($connect,$sqlFind);
            if(mysqli_num_rows($resultFind)>0){
                echo '<script>alert("The Email is already registered.")</script>';
            }
            else{
                $input="INSERT INTO customer_info(CustomerName,Email,Password,Address,PhoneNumber) VALUES('$CustomerName','$Email','$Password','$Address','+88".$PhoneNumber."')";
                
                $result= mysqli_query($connect, $input);
                if($result){
                    $_SESSION['Email']=$Email;
                    
                 header('location:customer_profile.php');
                }else{
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
            box-shadow: 0px 0px 20px rgb(12, 12, 12);
            -webkit-box-shadow: 0px 0px 20px rgb(17, 17, 17);
            -moz-box-shadow: 0px 0px 20px rgb(15, 14, 15);
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
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active" style="margin: 5px ;background-color: rebeccapurple">
                        <a class="nav-link text-light" href="index.html">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item " style="margin: 5px;background-color: rebeccapurple">
                        <a class="nav-link text-light" href="admin_login.html">Admin Login</a>
                    </li>
                    <li class="nav-item" style="margin: 5px;background-color: rebeccapurple">
                        <a class="nav-link text-light" href="customer_login.html">Customer - Login/Sign up</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container signup">
        <form method="post" action="" enctype="multipart/form-data">
            <div class="form-group">
                <label for="inputName"><b>Customer Name</b></label>
                <input type="text" class="form-control" id="inputName" name="CustomerName">
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4"><b>Email</b></label>
                    <input type="email" class="form-control" id="inputEmail4" name="Email">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4"><b>Password</b></label>
                    <input type="password" class="form-control" id="inputPassword4" name="Password">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputAddress"><b>Address</b></label>
                    <input type="text" class="form-control" id="inputAddress" name="Address">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputNumber"><b>Phone Number</b></label>
                    <input type="text" class="form-control" id="inputNumber" name="PhoneNumber" pattern="[0]{1}[1]{1}[0-9]{9}">
                </div>
            </div>
            <button type="submit" class="btn btn-dark login_btn" name="signup">Sign in</button>
        </form>
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
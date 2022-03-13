<?php
session_start();
include_once('database.php');
if ($connect) {
    if (isset($_SESSION['CustomerID'])) {
        $CustomerID = $_SESSION['CustomerID'];
        $sql2 = "SELECT * FROM cart inner join product_info using(proID) where CustomerID='$CustomerID' and flag='1'";
        $res2 = mysqli_query($connect, $sql2);
        $sqlfetch = "SELECT * FROM customer_info where CustomerID='$_SESSION[CustomerID]'";
        $res = mysqli_query($connect, $sqlfetch);
        $row = mysqli_fetch_assoc($res);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/animate.css">
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/admin_query.css">
</head>
<body>
     <!--Start of a navbar-->
  <nav class="navbar navbar-expand-lg navbar-light bg-color sticky-top">
    <a class="navbar-brand" href="#">
      <img src="../media/banner1 (2).png" class="img-fluid logo-image" alt="Responsive image"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto nav-margin">
        <li class="nav-item active">
          <a class="nav-link nav-color ac-color animate__animated animate__zoomIn wow zoomIn" href="../php/Home.php">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link nav-color animate__animated animate__zoomIn wow zoomIn " href="../php/product.php">Product</a>
        </li>


        <li class="nav-item active">
          <a class="nav-link nav-color  animate__animated animate__zoomIn wow zoomIn" href="../php/about.php"> About Us <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle nav-color " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Details
          </a>
          <div class="dropdown-menu dp" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="../php/blog.php">Blog </a>
            <a class="dropdown-item" href="../php/rules.php">Delivery Rules</a>
            <a class="dropdown-item" href="../php/FAQ.php">FAQS</a>
          </div>
        </li>

        <li class="nav-item active">
          <a class="nav-link nav-color  animate__animated animate__zoomIn wow zoomIn" href="../php/contact.php">Contact Us <span class="sr-only">(current)</span></a>
        </li>


        <li class="nav-item active">
          <a class="nav-link nav-color  animate__animated animate__zoomIn wow zoomIn" href="../php/admin_login.php">Admin Login
            <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item active">
          <a class="nav-link nav-color  animate__animated animate__zoomIn wow zoomIn" href="../php/customer_login.php">Customer- Login/Signup <span class="sr-only">(current)</span></a>
        </li>



      </ul>

    </div>
  </nav>
  <!--end of a navbar-->




  <div class="container heading">
    <h1>Welcome <?php echo $row["CustomerName"]; ?></h1>

  </div>
  <div class="menu bg-light">
    <div class="container">
      <div class="row text-center info">
        <div class="col-sm">
          <a href="customer_update.php" class="btn  btn-light ">Update Details</a>

        </div>
        <div class="col-sm">
          <a href="customer_profile.php?delete=<?php echo $row['CustomerID']; ?>" class="btn  btn-light">Delete Your Account</a></button>
        </div>
        <div class="col-sm">
          <a href="order_info.php" class="btn  btn-light">Your order</a></button>
        </div>
        <div class="col-sm">
          <a href="cart.php" class="btn  btn-light">Cart</a></button>
        </div>
        <div class="col-sm logbtn">
          <?php
          if (isset($_POST['logout'])) {
            session_destroy();
            header('location:index.php');
          }
          ?>
          <form method="post" action="" enctype="multipart/form-data">
            <button type="submit" class="btn btn-light" name="logout">Log out</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <br>

<div class="container">
<?php
    include_once('database.php');
    if ($connect) {
        $CustomerID = $_SESSION['CustomerID'];
        $sql2 = "SELECT * FROM cart inner join product_info using(proID) where CustomerID='$CustomerID' and flag='1'";
        $res2 = mysqli_query($connect, $sql2);
        $result2 = mysqli_num_rows($res2);
        if ($result2 > 0) {
    ?>
            <div class="container heading">
                <h3>Order Information</h3>
            </div>
            <table class="table table-striped text-center">
                <div class="container">
                    <thead class="thead-dark container">
                        <th>Product Name</th>
                        <th>Amount</th>
                        <th>Cost</th>
                        <!-- <th>PaymentMethod</th> -->
                        <th>Delivery Status</th>
                        <th>Cancel Order</th>
                    </thead>
                    <?php
                    while ($row2 = mysqli_fetch_assoc($res2)) :
                    ?>
                        <!-- <table class="table table-striped table-hover table-bordered "> -->
                        <tr class="text-center container">
                            <td><?php echo $row2['proName']; ?></td>
                            <td><?php echo $row2['amount']; ?></td>
                            <td><?php echo $row2['price']; ?></td>
                            <?php
                            if ($row2['cflag'] == 0) {
                            ?>
                                <td><?php echo "Order processed" ?><i class='fa fa-pause-circle' style='color: teal'></i></td>

                            <?php
                            } else {
                            ?>
                                <td><?php echo "Delivered" ?><i class='fa fa-check-circle' style='color: green'></i></td>
                            <?php
                            }
                            ?>
                            <?php
                            if ($row2['cflag'] == 0) {
                            ?>
                                <td><a href="order_info.php?cancel=<?php echo $row2['cartID']; ?>" class="btn btn-danger">Cancel Order</a></button></td>

                            <?php
                            } else {
                            ?>
                                <td><button type="button" class="btn btn-danger" disabled>Cancel order</button></td>
                            <?php
                            }
                            ?>
                        </tr>
                    <?php endwhile; ?>
                </div>
            </table>
            <table class="table table-striped table-hover table-bordered mt-2">
                <tr class="bg-dark text-light text-center">
                    <th>Total Order</th>
                </tr>
                <tr class="text-center">
                    <th><?php echo $result2 ?></th>
                </tr>
            </table>
            <table class="table table-striped table-hover table-bordered mt-2">
                <tr class="bg-dark text-light text-center">
                    <th>Pending Order</th>
                </tr>
                <?php
                    $sql3 = "SELECT * FROM cart inner join product_info using(proID) where CustomerID='$CustomerID' and flag='1' and cflag='0'";
                    $res3 = mysqli_query($connect, $sql3);
                    $result3 = mysqli_num_rows($res3);
                ?>
                <tr class="text-center">
                    <th><?php echo $result3 ?></th>
                </tr>
            </table>
    <?php
        } 
        else 
        {
    ?>
            <h1 class="text-center text-danger mt-3">you haven't placed any orders yet</h1>
    <?php
        }
    }
    ?>
</body>
</html>
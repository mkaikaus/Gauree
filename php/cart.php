<?php
session_start();
include_once('database.php');
if ($connect) {
    if (isset($_SESSION['proID'])) {
        $CustomerID = $_SESSION['CustomerID'];
        $sql2 = "SELECT * FROM cart inner join product_info using(proID) where CustomerID='$CustomerID'";
        $res2 = mysqli_query($connect, $sql2);
        // $row2 = mysqli_fetch_assoc($res2);
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/animate.css">
    <link rel="stylesheet" href="../css/index.css">
</head>

<body>
    <div class="container">
        <div class="card-columns">
            <?php
            while ($row2 = mysqli_fetch_assoc($res2)) :
            ?>
                <div class="card mt-4 text-center" style="width: 20rem; border-color:#8946A6">
                    <img class="card-img-top" src="../user_image/<?php echo $row2['image']; ?>" style="width: 20rem;height: 20rem;" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title text-center font-weight-bold" style="color: #B762C1">
                            <?php echo $row2['proName']; ?></h5>
                        <h6 class="card-title font-weight-bold"><span style="color: #EA99D5">Type:
                            </span><?php echo $row2['proType']; ?></h6>
                        <h6 class="card-title font-weight-bold"><span style="color: #EA99D5">Price:
                            </span><?php echo $row2['price']; ?> Tk</h6>
                    </div>
                </div>
            <?php
            endwhile;
            ?>
        </div>
        <form method="post" action="" enctype="multipart/form-data">
            <button type="submit" class="btn btn-primary" name="order">Check Out</button>
        </form> 
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
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
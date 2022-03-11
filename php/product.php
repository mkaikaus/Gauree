
<?php
   include_once('database.php');
if(isset($_POST['search'])){
    $valuetosearch1=$_POST['valueTosearch1'];
    $valuetosearch2=$_POST['valueTosearch2'];
    $valuetosearch3=$_POST['valueTosearch3'];
    $query="SELECT * FROM product_info where (proName LIKE '%$valuetosearch1%' and  proType LIKE '%$valuetosearch2%' and price LIKE '%$valuetosearch3%')";
    $res=mysqli_query($connect,$query);
}
else{
        $product = "SELECT * from product_info";
        $res=mysqli_query($connect, $product);
        $valuetosearch1="";
        $valuetosearch2="";
        $valuetosearch3="";
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
    <style>
        .btn-dark{
    background-color: #B762C1!important;
    color: white;
    font-size: large;
}
</style>
</head>

<body>
      <?php include("navbar.php");?>



          


    <div class="product container">
        <h1 class="mt-3" style="color: #8946A6">Our Product</h1>
       
       <div class="container b_head">
        <h4 class="text-center m-5"><em><q>Try searching specific research papers by specific authors or even research subject!</q></em></h4>
    </div>
    <div class="container b_search">
    <form action="" method="POST" class="text-center text-info font-weight-bold">
        <div class="form-row">
            <label for="inputName" class="col-sm-1 col-form-label">Product Name</label>
            <div class="form-group col-md-3">
                <input class="form-control" type="text" name="valueTosearch1" placeholder="Search by topic"
                    value="<?php echo $valuetosearch1;?>">
            </div>
            <label for="inputName" class="col-sm-1 col-form-label">Product Type</label>
            <div class="form-group col-md-3">
                <input class="form-control" type="text" name="valueTosearch2" placeholder="Search by title"
                    value="<?php echo $valuetosearch2;?>">
            </div>
            <label for="inputName" class="col-sm-1 col-form-label">Price</label>
            <div class="form-group col-md-3">
                <input class="form-control" type="text" name="valueTosearch3" placeholder="Search by author"
                    value="<?php echo $valuetosearch3;?>">
            </div>
        </div>
        <input class="form-group col-md-1 btn btn-info text-center"  style="background-color: #142850;" type="submit" name="search" value="Search"><br><br>
    </form>

    </div>
         
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
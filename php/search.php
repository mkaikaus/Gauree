
<?php
    include('database.php');
    
    session_start();
    if(isset($_GET['author'])){
        $Author_ID=$_GET['author'];
        $_SESSION['Author_ID']=$Author_ID;
        echo $_SESSION['Author_ID'];
        header('location:blogger_profile.php');
        }
        if(isset($_GET['article'])){
            $Blog_ID=$_GET['article'];
            $_SESSION['Blog_ID']=$Blog_ID;
            echo $_SESSION['Blog_ID'];
            header('location:article.php');
            }
?>

<?php
if(isset($_POST['search'])){
    $valuetosearch1=$_POST['valueTosearch1'];
    $valuetosearch2=$_POST['valueTosearch2'];
    $valuetosearch3=$_POST['valueTosearch3'];
    $query="SELECT * FROM product_info where (proName LIKE '%$valuetosearch1%' and  proType LIKE '%$valuetosearch2%' and price LIKE '%$valuetosearch3%')";
    $res=mysqli_query($connect,$query);
}
else{
        $find = "SELECT * from product_info";
        $res = mysqli_query($connect, $find);
        $valuetosearch1=" ";
        $valuetosearch2=" ";
        $valuetosearch3=" ";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/animate.css">
    <link rel="stylesheet" href="../css/blog.css?v=<?php echo time();?>">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather&family=Montserrat&family=Sacramento&display=swap"
        rel="stylesheet">
</head>

<body>
    <?php include("navbar.php");?>


    <div class="hero-image">
        <div class="hero-text">
            <h1>Our Blog</h1>
            <p><q>Reading is essential for those who seek to rise above the ordinary.</q></p>
        </div>
    </div>
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
    <div class="product container mt-5 mb-5">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php
                while ($row = mysqli_fetch_assoc($res)) :
                ?>
            <div class="col">
                <div class="card blog">
                    <img class="card-img-top" src="../user_image/<?php echo $row['image'];?>" style="width: 100%" 
                        alt="Card image cap">
                    <div class="card-body">
                        <div class="blog-list">
                            <div>
                                <span><?php echo $row['Topic']; ?></span>
                            </div>
                            <span><i class="fa fa-calendar me-1"></i>
                                <?php echo $row['Date']; ?></span>
                            </a>
                            </span>
                        </div>
                        <h5 class="blog-title"><a href="blog.php?article=<?php echo $row['Blog_ID'];?>"
                                rel="bookmark"><?php echo $row['Title']; ?></a></h5>
                        <div class="d-flex align-items-center justify-content-between blog-list2">
                            <div class="author d-flex align-items-center" style="position:absolute;bottom:15px;">

                                <a class="fw-bold" style="font-size: 13px;"
                                    href="blog.php?author=<?php echo $row['Author_ID'];?>">
                                    <span><?php echo $row['Author_Name'];?></span>
                                </a>
                            </div>

                            <a href="blog.php?article=<?php echo $row['Blog_ID'];?>"
                                class="btn  text-light btn-sm hhn"  id="blog_btn" tabindex="-1" role="button"
                                aria-disabled="true" style="position:absolute;bottom:10px; left:230px;">Read full blog</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
    </div>


    <?php include("footer.php");?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="../js/wow.js"></script>
    <script>
    new WOW.init();
    </script>
    <script src="../js/main.js"></script>
</body>

</html>
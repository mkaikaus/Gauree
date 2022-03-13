<?php
session_start();
include_once('database.php');
if ($connect) {
    if(isset($_GET['article'])){
        $Blog_ID=$_GET['article'];
        $_SESSION['Blog_ID']=$Blog_ID;
        header('location:article.php');
        }
}
?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/blog.css">
    <link rel="stylesheet" href="../css/index.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather&family=Montserrat&family=Sacramento&display=swap" rel="stylesheet">


    <!-- Java Script -->
    <script src="../js/jquery.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>

</head>
<script>
    $(function() {
        var includes = $('[data-include]');
        jQuery.each(includes, function() {
            var file = $(this).data('include') + '.html';
            $(this).load(file);
        });
    });
</script>

<body>
   
   <!--Start of a navbar-->
  <nav class="navbar navbar-expand-lg navbar-light bg-color sticky-top">
    <a class="navbar-brand" href="#">
      <img src="../media/banner1 (2).png" class="img-fluid logo-image" alt="Responsive image"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto nav-margin">
        <li class="nav-item active">
          <a class="nav-link nav-color ac-color animate__animated animate__zoomIn wow zoomIn" href="../php/Home.php">Home <span
              class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link nav-color animate__animated animate__zoomIn wow zoomIn " href="../php/product.php">Product</a>
        </li>

       
        <li class="nav-item active">
          <a class="nav-link nav-color  animate__animated animate__zoomIn wow zoomIn" href="../php/about.php"> About Us <span
              class="sr-only">(current)</span></a>
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
          <a class="nav-link nav-color  animate__animated animate__zoomIn wow zoomIn" href="../php/contact.php">Contact Us <span
              class="sr-only">(current)</span></a>
        </li>


        <li class="nav-item active">
          <a class="nav-link nav-color  animate__animated animate__zoomIn wow zoomIn" href="../php/admin_login.php">Admin Login
            <span class="sr-only">(current)</span></a>
        </li>
             <li class="nav-item active">
          <a class="nav-link nav-color  animate__animated animate__zoomIn wow zoomIn" href="../php/customer_login.php">Customer- Login/Signup <span
              class="sr-only">(current)</span></a>
        </li>



      </ul>

    </div>
  </nav>
  <!--end of a navbar-->

 


    <div class="hero-image">
        <div class="hero-text">
            <h1>Gauree's Blog</h1>
            <p><q>The name of Aristocracy.</q></p>
        </div>
    </div>
    <div class="product container mt-5">
        <?php

        if ($connect) {
            $sqlfetch = "SELECT * FROM blog";
           
            $res = mysqli_query($connect, $sqlfetch);           

        ?>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php
            while ($row = mysqli_fetch_assoc($res)) :
            ?>
                <div class="col">
                    <div class="card blog">
                        <img class="card-img-top" src="../media/<?php echo $row['Image']; ?>" style="width: 100%" alt="Card image cap">
                        <div class="card-body">
                            <div class="blog-list">

                                <h5 class="blog-title"><?php echo $row['Title']; ?>
                                </h5>
                                <div class="d-flex align-items-center justify-content-between blog-list">
                                <!-- <?php echo $row['Blog_ID']; ?> -->
                                    <a href="blog.php?article=<?php echo $row['Blog_ID']; ?>" class="btn btn-primary btn-info text-light btn-sm" id="blog_btn" tabindex="-1" role="button" aria-disabled="true" style="position:absolute;bottom:10px; left:230px;">Read full blog</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
        <?php
        }
        ?>
    </div>
    <!-- <div class="row row-cols-1 row-cols-md-3 g-4">
            <div class="col">
                <div class="card blog">
                    <img class="card-img-top" src="../media/blog-4.jpg" style="width: 100%" alt="Card image cap">
                    <div class="card-body">

                        <h5 class="blog-title"><a href="#" rel="bookmark">Joypuri Lakh bangles</a></h5>
                        <div class="d-flex align-items-center justify-content-between blog-list">

                            <a href="article.html" class="btn btn-primary btn-info text-light btn-sm" tabindex="-1" role="button" aria-disabled="true">Read full blog</a>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card blog">
                    <img class="card-img-top" src="../media/blog5.jpg" style="width: 100%" alt="Card image cap">
                    <div class="card-body">
                        <div class="blog-list">

                            <h5 class="blog-title"><a href="#" rel="bookmark">Silver Metal</a></h5>

                            <a href="reseach_process.html" class="btn btn-primary btn-info text-light btn-sm" tabindex="-1" role="button" aria-disabled="true">Read full blog</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card blog">
                    <img class="card-img-top" src="../media/blog6.jpg" style="width: 100%" alt="Card image cap">
                    <div class="card-body">
                        <div class="blog-list">
                            <div>
                                <a href="#" title="blog about education">Joypuri metal printed
                                    bangles</a>
                            </div>

                        </div>
               
                        <a href="blog.php?article=<?php echo $row['Blog_ID']; ?>"
                                class="btn  text-light btn-sm hhn"  id="blog_btn" tabindex="-1" role="button"
                                aria-disabled="true" style="position:absolute;bottom:10px; left:230px;">Read full blog</a>

                    </div>
                </div>
            </div>
        </div> -->


    <footer class="text-center text-lg-starttext-muted mt-5 blog_footer">
        <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
            © 2022 Copyright:
            <a class="text-reset fw-bold" href="https://mdbootstrap.com/">Gauree</a>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="../js/jquery-3.5.1.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/wow.js"></script>
    <script>
        new WOW.init();
    </script>
    <script src="../js/main.js"></script>
</body>

</html>
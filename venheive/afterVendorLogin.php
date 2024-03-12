<?php
session_start();
if(isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true)
{
    header("location: homepage.php");
    exit;
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Welcome - <?php $_SESSION['username']?></title>
</head>
<body>
    <?php
        require 'Partials/navbar.php' ;

    ?>
      Welcome - <?php $_SESSION['username']?>
      <div class="px-4 pt-5 my-5 text-center border-bottom">
    <h1 class="display-4 fw-bold text-body-emphasis">Welcome to VENHIVE</h1>
    <div class="col-lg-6 mx-auto">
      <p class="lead mb-4">Discover the Best Local Vendors and More,Find the trusted local buisnesses and services,Explore the wide range of Products and solutions</p>
     
  
    </div>
    <div class="overflow-hidden" style="max-height: 60vh;">
      <div class="container px-5">
        <img src="final landing page.png" class="img-fluid border rounded-3 shadow-lg mb-4" alt="Example image" width="700" height="500" loading="lazy">
      </div>
    </div>
  </div>

      

      <!-- bootstrap javascript -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
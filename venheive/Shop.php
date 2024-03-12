<!-- <?php
session_start();



?> -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Welcome - <?php echo $_SESSION['username']?></title>
</head>
<body>
    <?php
        require 'Partials/navbar.php' ;
    ?>
    
    
    <!-- <?php echo "<h2>Hii there vendor " . $_SESSION['firstName'] . " " . $_SESSION['lastName'] . ""; ?> -->


    
    <div class="container mt-3">
        <h1 class = "text-center">Enter Your Shop details</h1>
        <form action="/venheive/customerSignup.php" method="post">
            <div class="mb-3">
              <label for="shopregNo" class="form-label">Reg No</label>
              <input type="number" class="form-control" id="shopregNo"  name="productId">
            </div>

            <div class="mb-3">
              <label for="shopName" class="form-label">Shop Name</label>
              <input type="text" class="form-control" id="shopName" name="productName">
            </div>
            

            <div class="form-floating mb-3">
                <textarea class="form-control" placeholder="Address description" id="addressDescription" style = "height:100px"></textarea>
                <label for="addressDescription">Address description</label>
            </div>

            <button type="submit" class="btn btn-primary ">Submit</button>
          </form>
      </div>
      
      

      <!-- bootstrap javascript -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
      



</body>
</html>
<?php
session_start();

?>

<?php
      $showError = "";
      $showAlert = false;
      if($_SERVER['REQUEST_METHOD'] == 'POST')
      {
        include 'Partials/dbConnect.php';


        $name = $_POST['shopName'];
        $addressDescription = $_POST['addressDescription'];
        $addressDescription = mysqli_real_escape_string($conn, $addressDescription);

    
   
        $sql = "INSERT INTO shop (vendor_reg_no, shop_name, address) VALUES ('" . $_SESSION['regNo'] . "', '$name', '$addressDescription')";

        $result = mysqli_query($conn,$sql);
        if($result)
        {
            $showAlert = true;
        }
        else
        {
          $showError = "Unable to execute the sql";
        }
    
    
  }



      
  ?>
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
    
    
    <?php
    if($showAlert)
    {
        echo'<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong> 
  Shop Registeration completed<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
    }
    if($showError)
    {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Failed</strong> '.$showError.'
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    ';
    }
    ?>


    
    <div class="container mt-3">
        <h1 class = "text-center">Enter Your Shop details</h1>
        <form action="/venheive/vendorShop.php" method="post">
            <div class="mb-3">
              <label for="shopregNo" class="form-label">Reg No</label>
              <input type="number" class="form-control" id="shopregNo"  name="shopregNo">
            </div>

            <div class="mb-3">
              <label for="shopName" class="form-label">Shop Name</label>
              <input type="text" class="form-control" id="shopName" name="shopName">
            </div>
            

            <div class="form-floating mb-3">
                <textarea class="form-control" placeholder="Address description" id="addressDescription" style = "height:100px" name = "addressDescription"></textarea>
                <label for="addressDescription">Address description</label>
            </div>

            <button type="submit" class="btn btn-primary ">Submit</button>
          </form>
      </div>
      
      

      <!-- bootstrap javascript -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
      



</body>
</html>
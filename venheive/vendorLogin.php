
<?php
$login = false;
$showError = false;
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    include 'Partials/dbConnect.php';


$email = $_POST['email'];
$password = $_POST['pass'];

    
        $sql = "select * from vendor where vendors_email = '$email' and login_password = '$password'";
        $sqlForname = "SELECT first_name, last_name ,vendor_reg_no FROM vendor WHERE vendors_email = '$email'";
        $result = mysqli_query($conn,$sql);
        
        $num = mysqli_num_rows($result);

        if($num == 1)
        {
          $login = true;
          $result1 = mysqli_query($conn,$sqlForname);
          session_start();

          $_SESSION['loggedin'] = true;
          $_SESSION['username'] = $email;
          $_SESSION['vendor'] = true;
          $_SESSION['customer'] = false;
          if($result1)
          { $row = mysqli_fetch_assoc($result1);
            $_SESSION['firstName'] = $row['first_name'];
            $_SESSION['lastName'] = $row['last_name'];
            $_SESSION['regNo'] = $row['vendor_reg_no'];
          }
          else
          {
            echo 'unable to fetch details';
          }

 
          header("location: homePage.php");
        }
        else
        {
            $showError = "Invalid Credentials";
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
    <title>login</title>
</head>
<body>
    <?php
    require 'Partials/navbar.php'
    ?>

    <?php
    if($login)
    {
        echo'<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong> You are logged In<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
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
        <h1 class= "text-center">Login For vendor</h1>
        <form action="/venheive/vendorLogin.php" method="post">
            <div class="mb-3">
              <label for="email" class="form-label">Email address</label>
              <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email">
              <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
              <label for="pass" class="form-label">Password</label>
              <input type="password" class="form-control" id="pass" name="pass">
            </div>
            
            <!-- to center the button -->
            <!-- <div class="d-flex justify-content-center"></div> -->
            <button type="submit" class="btn btn-primary ">Log In</button>
          </form>
      </div>

      <!-- bootstrap javascript -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>

<?php
$showAlert = false;
$showError = false;
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
  include 'Partials/dbConnect.php';


$email = $_POST['email'];
$password = $_POST['pass'];
$cpassword = $_POST['confirmPass'];
$regNo = $_POST['regNo'];
$firstName = $_POST['firstName'];
$middleName = $_POST['middleName'];
$lastName = $_POST['surName'];
// $exists = false;
$existsSql = "select * from `vendor` where vendors_email = '$email'";

  $result1 = mysqli_query($conn,$existsSql);

    $numExistsRows = mysqli_num_rows($result1);

    if($numExistsRows >0 )
    {
      $showError = "The Email is Already used";
    }
    else
    {

    if(($password == $cpassword) )
    {
        $sql = "INSERT INTO `vendor` ( `vendors_email`, `first_name`, `middle_name`, `last_name`, `login_password`, `Reg_time`) VALUES ( '$email', '$firstName', '$middleName', '$lastName', '$cpassword', current_timestamp())";

        $result = mysqli_query($conn,$sql);
        if($result)
        {
            $showAlert = true;
        }
    }
    else
    {
        $showError = "Password doesn't match";
    }
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
    if($showAlert)
    {
        echo'<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong> 
  Sign up successful Thank you For registration<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
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
        <h1 class= "text-center">Sign up For vendor</h1>
        <form action="/venheive/vendorSignup.php" method="post">
            <div class="mb-3">
              <label for="email" class="form-label">Email address</label>
              <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email">
              <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
              <label for="pass" class="form-label">Password</label>
              <input type="password" class="form-control" id="pass" name="pass">
            </div>
            <div class="mb-3">
              <label for="pass" class="form-label">Confirm Password</label>
              <input type="password" class="form-control" id="confirmPass" name="confirmPass">
              <div id="confirmPassHelp" class="form-text">Enter same password as mentioned before</div>
            </div>
            <div class="mb-3">
              <label for="regNo" class="form-label">Registration Number</label>
              <input type="" class="form-control" id="regNo" name="regNo">
            </div>

            <div class="mb-3">
              <label for="firstName" class="form-label">Name</label>
              <input type="" class="form-control" id="firstName" name="firstName">
            </div>
            <div class="mb-3">
              <label for="middleName" class="form-label">Middle Name</label>
              <input type="" class="form-control" id="middleName" name="middleName">
            </div>
            <div class="mb-3">
              <label for="surName" class="form-label">Surname</label>
              <input type="" class="form-control" id="surName" name="surName">
            </div>
            <!-- to center the button -->
            <!-- <div class="d-flex justify-content-center"></div> -->
            <button type="submit" class="btn btn-primary ">Sign In</button>
          </form>
      </div>

      <!-- bootstrap javascript -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
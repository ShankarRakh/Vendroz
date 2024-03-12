
<?php
$loggedin = false;
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
{
    $loggedin = true;
}


echo '
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">VENHIVE</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/venheive/homePage.php">Home</a>
              </li>';

              if($loggedin)
              {
                if($_SESSION['customer'] && !$_SESSION['vendor'])
                {
                  echo '
                  <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="/venheive/customersProduct1.php">Products</a>
                </li>';
                }

                if(!$_SESSION['customer'] && $_SESSION['vendor'])
                {
                  echo '
                  <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="/venheive/vendorProfile.php">Profile</a>
                </li>';
                  echo '
                  <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="/venheive/vendorProducts.php">Products</a>
                </li>';
                }
              }

              
              if(!$loggedin)
              {
              echo '
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Sign Up
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="/venheive/vendorSignup.php">Vendor</a></li>
                  <li><a class="dropdown-item" href="/venheive/customerSignup.php">Customer</a></li>
                </ul>
              </li>

              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Login
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="/venheive/vendorLogin.php">Vendor</a></li>
                  <li><a class="dropdown-item" href="/venheive/customerLogin.php">Customer</a></li>
                </ul>
              </li>
              ';}
              
              if($loggedin)
              {
              echo '
              <li class="nav-item">
                <a class="nav-link" href="/venheive/logout.php">Logout</a>
              </li>';}
              
            echo '  
            </ul>
            <form class="d-flex" role="search">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
          </div>
        </div>
      </nav>
      ';

?>
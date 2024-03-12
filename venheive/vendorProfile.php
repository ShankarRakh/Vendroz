<?php
session_start();



?>


<?php 
    
$showAlert = false;
$showError = false;
$regNo = $_SESSION['regNo'];

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
  
include 'Partials/dbConnect.php';


$productId = $_POST['productId'];
$productName = $_POST['productName'];
$category = $_POST['Category']; // Get the selected category
$subCategory = $_POST['subCategory']; // Get the selected sub-category
$manufacturer = $_POST['Manufacturer'];
$productDescription = $_POST['productDescription'];
$productStock = $_POST['productStock'];
$productPrice = $_POST['productPrice'];


if (
    
    empty($productName) ||
    $category === "Unselected" ||
    $subCategory === "Unselected" ||
    empty($productDescription) ||
    $productStock < 0 ||
    $productPrice < 0
) {
    $showError = "Please fill in all required fields and ensure that stock and price are positive values.";
} else {


    $existsSql = "select * from `product` where Name = '$productName'";
    $result1 = mysqli_query($conn,$existsSql);

    $numExistsRows = mysqli_num_rows($result1);

    if($numExistsRows >0 )
    {
      $showError = "The Product is already listed by You";
    }
    else
    {

    
        $sql = "INSERT INTO `product` (`Product_id`, `Name`, `Quantity`, `Price`, `Manufacturer_id`, `Category_id`, `sub_Category_id`,`description`,`vendor_id`) VALUES ('$productId', '$productName', '$productStock', '$productPrice', '$manufacturer', '$category', '$subCategory','$productDescription','$regNo')";

        $result = mysqli_query($conn,$sql);


        if($result)
        {
            $showAlert = true;
        }
        else
        {
            $showError = "Something wrong in the code";
        }
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
  Product register successfully<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
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
    
    <!-- <?php echo "<h2>Hii there vendor " . $_SESSION['firstName'] . " " . $_SESSION['lastName'] . ""; ?> -->


    
    <div class="container mt-3">
        <h1 class = "text-center">Insert Your Product</h1>
        <form action="/venheive/vendorProfile.php" method="post">
            <div class="mb-3">
              <label for="productId" class="form-label">Product id</label>
              <input type="number" class="form-control" id="productId"  name="productId">
            </div>

            <div class="mb-3">
              <label for="productName" class="form-label">Product Name</label>
              <input type="text" class="form-control" id="productName" name="productName">
            </div>
            
            <div class="form-floating mb-3">

                <select class="form-select" id="Category" aria-label="Floating label select example" name = "Category">
                    <option selected>Unselected</option>
                    <option value="1">Food and Dining</option>
                    <option value="2">Services</option>
                    <option value="3">Retail</option>
                    <option value="4">Health and Wellness</option>
                    <option value="5">Technology and Electronics</option>
                </select>
                <label for="Category">Select Category</label>
            </div>

            <div class="form-floating mb-3">

                <select class="form-select" id="subCategory" aria-label="Floating label select example" name ="subCategory">
                <option selected>Unselected</option>    
                    
                </select>
                <label for="subCategory">Select Sub-Category</label>
                
            </div>
            

            <div class="form-floating mb-3">
                <select class="form-select" id="Manufacturer" aria-label="Floating label select example" name = "Manufacturer">
                    <option selected>Select Manufacturer</option>
                    <option value="1">Amul</option>
                    <option value="2">Apollo Pharmacy</option>
                    <option value="3">Haldiram's</option>
                    <option value="4">Himalaya Herbals</option>
                    <option value="5">Parle</option>
                    <option value="6">Tata</option>
                </select>
                <label for="Manufacturer">Manufacturer</label>
                
            </div>



            

            <div class="form-floating mb-3">
                <textarea class="form-control" placeholder="Enter Product description" id="productDescription" name = "productDescription" style = "height:100px"></textarea>
                <label for="productDescription">Product description</label>
            </div>

            <div class="mb-3">
              <label for="productStock" class="form-label">Stock</label>
              <input type="number" class="form-control" id="productStock" name="productStock">
            </div>

            
            <div class="mb-3">
              <label for="productPrice" class="form-label">Price</label>
              <input type="number" class="form-control" id="productPrice" name="productPrice">
            </div>

            
            <button type="submit" class="btn btn-primary ">Insert</button>
          </form>
      </div>
      
      

      <!-- bootstrap javascript -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
      
<script>


document.getElementById("Category").addEventListener("change", function () {

            var category = this.value;
            var subcategoryDropdown = document.getElementById("subCategory");
            // Clear existing options
            subcategoryDropdown.innerHTML = "<option selected>Unselected</option>";
            
            // You can define subcategories based on the selected category here
            var subcategories = {
                1: ["Restaurants", "Cafe's", "Bakeries","Street Food","Grocery"],
                2: ["Plumbing Services", "Electrical Services","Cleaning Services","Legal Services","Pet Care Services"],
                3: ["Clothing","Home and Furniture","Books and Stationary","Jewelary and Accessories","Wearables"],
                4: ["Pharmacies", "Fitness Centers", "Yoga Studio","Medical Clinics","Spas"],
                5: ["Computer and Accessories", "Mobiles","IT Services","Electronics Repair","Software Development"],
            };

            // Add subcategory options to the dropdown
            let i = parseInt(this.value);
            i = (i*5) - 4;
            subcategories[category].forEach(function (value) {
                var option = document.createElement("option");
                option.text = value;
                option.value = i;
                subcategoryDropdown.add(option);
                i++;
            });


        
        });



</script>



</body>
</html>
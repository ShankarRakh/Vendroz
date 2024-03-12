<?php
session_start();

$showAlert = false;
$showError = false;
$shopDetails = false;

?>

<?php 
    
    include 'Partials/dbConnect.php';
    if(isset($_GET['details']))
    {
      $pId = $_GET['details'];
      $sql = " SELECT * FROM `shop` WHERE `vendor_reg_no` = $pId";
      $result = mysqli_query($conn,$sql); 
      $row = mysqli_fetch_assoc($result);
      if($result)
      {
        $shopDetails = "Shop Name :- ".$row['shop_name']." Address :- ".$row['address']." ";
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
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
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
  <strong>Success!</strong> <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
    }
    if($shopDetails)
    {
      echo '<div class="alert alert-success alert-dismissible " role="alert">
      <h4 class="alert-heading">Address Below!</h4>
      <p>'.$shopDetails.'</p>
      <hr>
      <p class="mb-0">Make sure to Read the Address Carefully.</p>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
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
    
<div class="container">

<h1 class = "text-center">Select categories
</h1>

<form action="/venheive/customersProduct.php" method="post">

    
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
 
<button type="submit" class="btn btn-primary ">Submit</button>
      
</form>
</div>


<div class="container mt-3">
      

      <table class="table" id = "myTable">
        <thead>
          <tr>
            <th scope="col">Sr No</th>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
            <th scope="col">Price</th>
            <th scope="col">Stock</th>
            <th scope="col">Shop</th>
          </tr>
        </thead>
        <tbody>

        <?php 


$showAlert = false;
$showError = false;

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
  
include 'Partials/dbConnect.php';


$category = $_POST['Category']; 
$subCategory = $_POST['subCategory']; 


if (
    $category === "Unselected" ||
    $subCategory === "Unselected"
) 
{
    $showError = "Please fill in all required fields.";
} else {

    $existsSql = "select * from `product` where Category_id = '$category' and sub_Category_id = '$subCategory'" ;
    $result1 = mysqli_query($conn,$existsSql);

    $numExistsRows = mysqli_num_rows($result1);

    if($numExistsRows > 0 )
    {
        $showAlert = true;
        $sql = "select * from `product` where Category_id = '$category' and sub_Category_id = '$subCategory'";
        $result = mysqli_query($conn,$sql);
        if($result)
        {
          $i = 1;
            while($row = mysqli_fetch_assoc($result))
            {
              echo "<tr> 
              <th>".$i."</th>
              <td>".$row['Name']."</td>
              <td>".$row['description']."</td>
              <td>".$row['Price']."</td>
              <td>".$row['Quantity']."</td>
              <td><button class='details btn btn-sm btn-primary' id='".$row['vendor_id']."'>Details</button></td>
            </tr>";
      
    
              $i++;
                 } }
    }
    else
    {
        $showError = "Currently no Product's available for this combination";
    }
}
}



    
    ?>
          
        
          
        </tbody>
      </table>
    </div>



      <!-- bootstrap javascript -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
      <script
  src="https://code.jquery.com/jquery-3.7.1.js"
  integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
  crossorigin="anonymous"></script>

  <script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script>

      let table = new DataTable('#myTable');
    </script>

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
<script>
  details = document.getElementsByClassName("details");
  Array.from(details).forEach((element)=>{
        element.addEventListener("click",(e)=>{
          console.log("edit",);
          productid = e.target.id;
          window.location = `/venheive/customersProduct.php?details=${productid}`;

        })});
</script>
</body>
</html>
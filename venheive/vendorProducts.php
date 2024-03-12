<?php
session_start();

?>

<?php 


include 'Partials/dbConnect.php';
$showAlert = false;
if(isset($_GET['delete']))
{
  $pId = $_GET['delete'];
  $sql = "DELETE FROM product WHERE `product`.`Product_id` = $pId";
  $result = mysqli_query($conn,$sql); 
  if($result)
  {
    $showAlert = " Your product is Deleted Successfully";
  }
}



$showError = false;
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
  $showAlert = false;
  
if(isset($_POST['pId']))
{
    // echo "yes";
    // updating code
    $pId = $_POST['pId'];
    $productName = $_POST['productNameEdit'];
    $category = $_POST['CategoryEdit']; // Get the selected category
    $subCategory = $_POST['subCategoryEdit']; // Get the selected sub-category
    $manufacturer = $_POST['ManufacturerEdit'];
    $productDescription = $_POST['productDescriptionEdit'];
    $productStock = $_POST['productStockEdit'];
    $productPrice = $_POST['productPriceEdit'];

    if (
    
      empty($productName) ||
      $category === "Unselected" ||
      $subCategory === "Unselected" ||
      empty($productDescription)||
      $productStock < 0 ||
      $productPrice < 0
  ) 
  {
      $showError = "Please fill in all required fields and ensure that stock and price are positive values.";
  } 
  else 
  {
  
  
      
      
      
          $sql = "UPDATE `product` SET `Name`='$productName',`Quantity`='$productStock',`Price`='$productPrice',`Manufacturer_id`='$manufacturer',`Category_id`='$category',`sub_Category_id`='$subCategory',`description`='$productDescription' WHERE `product`.`Product_id` = $pId;";
  
          $result = mysqli_query($conn,$sql);
  
  
          if($result)
          {
              $showAlert = "Product edited Successfully";
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
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- bootstrap css -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
    
    
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
  <strong>Success!</strong>'.$showAlert.'<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
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
    
 

<!--Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLable" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="editModalLable">Edit Record</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="/venheive/vendorProducts.php" method="post">
        <div class="modal-body">


            <input type="hidden" name="pId" id = "pId">

            <div class="mb-3">
              <label for="productNameEdit" class="form-label">Product Name</label>
              <input type="text" class="form-control" id="productNameEdit" name="productNameEdit">
            </div>
            
            <div class="form-floating mb-3">

                <select class="form-select" id="CategoryEdit" aria-label="Floating label select example" name = "CategoryEdit">
                    <option selected>Unselected</option>
                    <option value="1">Food and Dining</option>
                    <option value="2">Services</option>
                    <option value="3">Retail</option>
                    <option value="4">Health and Wellness</option>
                    <option value="5">Technology and Electronics</option>
                </select>
                <label for="CategoryEdit">Select Category</label>
            </div>


            <div class="form-floating mb-3">

                <select class="form-select" id="subCategoryEdit" aria-label="Floating label select example" name ="subCategoryEdit">
                <option selected>Unselected</option>    
                    
                </select>
                <label for="subCategoryEdit">Select Sub-Category</label>
                
            </div>
            

            <div class="form-floating mb-3">
                <select class="form-select" id="ManufacturerEdit" aria-label="Floating label select example" name = "ManufacturerEdit">
                    <option selected value = "0">None of Below</option>
                    <option value="1">Amul</option>
                    <option value="2">Apollo Pharmacy</option>
                    <option value="3">Haldiram's</option>
                    <option value="4">Himalaya Herbals</option>
                    <option value="5">Parle</option>
                    <option value="6">Tata</option>
                    <option value="7">Cosmic Byte</option>
                    <option value="8">Samsung</option>
                </select>
                <label for="ManufacturerEdit">Manufacturer</label>
                
            </div>



            

            <div class="form-floating mb-3">
                <textarea class="form-control" placeholder="Enter Product description" id="productDescriptionEdit" name = "productDescriptionEdit" style = "height:100px"></textarea>
                <label for="productDescriptionEdit">Product description</label>
            </div>

            <div class="mb-3">
              <label for="productStockEdit" class="form-label">Stock</label>
              <input type="number" class="form-control" id="productStockEdit" name="productStockEdit">
            </div>

            
            <div class="mb-3">
              <label for="productPriceEdit" class="form-label">Price</label>
              <input type="number" class="form-control" id="productPriceEdit" name="productPriceEdit">
            </div>

            
          
        
        <div class="modal-footer d-block mr-auto">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
      </div>
    </div>
  </div>
</div>


    

    <!-- <?php echo "<h2>Hii there vendor " . $_SESSION['firstName'] . " " . $_SESSION['lastName'] . ""; ?> -->

    <div class="container mt-3">
      

      <table class="table" id = "myTable">
        <thead>
          <tr>
            <th scope="col">Sr No</th>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
            <th scope="col">Price</th>
            <th scope="col">Stock</th>
            <th scope="col">Cat</th>
            <th scope="col">subCat</th>
            <th scope="col">Manuf</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>

        <?php 
    include 'Partials/dbConnect.php';
    $sql = "SELECT * FROM product where `vendor_id` = {$_SESSION['regNo']}";
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
          <td>".$row['Category_id']."</td>
          <td>".$row['sub_Category_id']."</td>
          <td>".$row['Manufacturer_id']."</td>
          <td><button class='edit btn btn-sm btn-primary' id='".$row['Product_id']."'>Edit</button> <button class='delete btn btn-sm btn-primary' id='d".$row['Product_id']."'>Delete</button></td>
        </tr>";
  

          $i++;
             } } 
             ?>
          
        
          
        </tbody>
      </table>
    </div>




    
    <!-- bootstrap javascript -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
      crossorigin="anonymous"
    ></script>
    <script
  src="https://code.jquery.com/jquery-3.7.1.js"
  integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
  crossorigin="anonymous"></script>
  <script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script>

      let table = new DataTable('#myTable');
    </script>
    <script>


      edits = document.getElementsByClassName("edit");
      Array.from(edits).forEach((element)=>{
        element.addEventListener("click",(e)=>{
          console.log("edit",);
          tr = e.target.parentNode.parentNode;
          name = tr.getElementsByTagName("td")[0].innerText;
          description = tr.getElementsByTagName("td")[1].innerText;
          price = tr.getElementsByTagName("td")[2].innerText;
          stock = tr.getElementsByTagName("td")[3].innerText;
          cat = tr.getElementsByTagName("td")[4].innerText;
          subCat = tr.getElementsByTagName("td")[5].innerText;
          Manufacturer = tr.getElementsByTagName("td")[6].innerText;

          var category = cat;
          var subcategoryDropdown = document.getElementById("subCategoryEdit");
          subcategoryDropdown.innerHTML = "<option selected>Unselected</option>";

            var subcategories = {
                1: ["Restaurants", "Cafe's", "Bakeries","Street Food","Grocery"],
                2: ["Plumbing Services", "Electrical Services","Cleaning Services","Legal Services","Pet Care Services"],
                3: ["Clothing","Home and Furniture","Books and Stationary","Jewelary and Accessories","Wearables"],
                4: ["Pharmacies", "Fitness Centers", "Yoga Studio","Medical Clinics","Spas"],
                5: ["Computer and Accessories", "Mobiles","IT Services","Electronics Repair","Software Development"],
            };

            // Add subcategory options to the dropdown
            let i = parseInt(cat);
            i = (i*5) - 4;
            subcategories[category].forEach(function (value) {
                var option = document.createElement("option");
                option.text = value;
                option.value = i;
                subcategoryDropdown.add(option);
                i++;
            });


          console.log(name,description,price,stock);
          
          productNameEdit.value = name;
          productDescriptionEdit.value = description;
          productPriceEdit.value = price;
          productStockEdit.value = stock;
          CategoryEdit.value = cat;
          subCategoryEdit.value = subCat;
          ManufacturerEdit.value = Manufacturer;

          
          pId.value = e.target.id;
          console.log(e.target.id);

          $('#editModal').modal('toggle');
        })
      })


      deletes = document.getElementsByClassName("delete");
      Array.from(deletes).forEach((element)=>{
        element.addEventListener("click",(e)=>{
          console.log("edit",);
          tr = e.target.parentNode.parentNode;
          name = tr.getElementsByTagName("td")[0].innerText;
          productid = e.target.id.substr(1,);

          if(confirm(`Are you sure to Delete this product With name ${name}`))
          {
            window.location = `/venheive/vendorProducts.php?delete=${productid}`;
          }
          else
          {

          }
          
        })
      })

    </script>
    <script>


document.getElementById("CategoryEdit").addEventListener("change", function () {

            var category = this.value;
            var subcategoryDropdown = document.getElementById("subCategoryEdit");
           
            subcategoryDropdown.innerHTML = "<option selected>Unselected</option>";
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

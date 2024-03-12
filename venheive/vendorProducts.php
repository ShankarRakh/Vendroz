<?php
session_start();

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
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>

        <?php 
    include 'Partials/dbConnect.php';
    $sql = "SELECT * FROM product";
    $result = mysqli_query($conn,$sql);
    if($result)
    {
      $i = 1;
        while($row = mysqli_fetch_assoc($result))
        {
            echo   "<tr> 
            
            <td>".$i."</td>
            <td>".$row['Name']."</td>
            <td>".$row['description']."</td>
            <td>".$row['Price']."</td>
            <td>".$row['Quantity']."</td>
            <td>edit delete</td>
          </tr>" ;

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
  </body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Search</title>
        
</head>
<style>
        table, th, td {
         border: 1px solid;
        }
</style>
<body>
<form action="<?php $_SERVER['PHP_SELF']  ?>" method="GET">
<input type="Text" placeholder="Search here.." name="search_text">
<input type="submit" value="Search">
</form>

<?php
$conn = mysqli_connect('localhost', 'root', '', 'store_db');

if(isset( $_GET['search_text'])){
        $search_text =  $_GET['search_text'];

        $sql ="SELECT * FROM product
        WHERE product_name LIKE '$search_text' ";

$query =  mysqli_query($conn, $sql);

  if (mysqli_num_rows($query) > 0){
        echo" <table> <tr> <th>ID</th> <th>Name</th> <th>Code</th> </tr>";
     while ($data =  mysqli_fetch_assoc($query)){

        $product_id   = $data['product_id'];
        $product_name = $data['product_name'];
        $product_code = $data['product_code'];
        
        echo"<tr>
                <td>$product_id</td>
                <td>$product_name</td>
                <td>$product_code</td>
        </tr>";
     }

        
  }
  echo "</table>";
} 
   
?>
        
</body>
</html>







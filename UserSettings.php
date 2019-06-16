<?php

include_once("admin/database.php");

?>


<?php
function getSales(){
    global $conn;
if(isset($_POST["add"])){
  $product=$_POST['product'];
  $quantity=$_POST['quantity'];
  $amount=$_POST['amount'];
  $price=$_POST['price'];
  $itemId=$_POST['itemId'];
  $cat=$_POST['cat'];


  $insertSales="INSERT INTO sales(itemID,Category,saleName,Price,quantity,Amount)
  VALUES('$itemId','$cat','$product','$price','$quantity','$amount')";
  $run_sales=mysqli_query($conn,$insertSales);

  if($run_sales){
      echo  "<div class='alert alert-success' role='alert'>
      Product added successfully!
      </div>";
  }else{
      echo  "<div class='alert alert-danger' role='alert'>
      failed to Add!
      </div>";
  }
}

 
}



function fetchSales(){
    global $conn;

    $fetchSales="SELECT * FROM sales";

    $run_fetch=mysqli_query($conn,$fetchSales);

    while($row=mysqli_fetch_array($run_fetch)){
        $itemID=$row['itemID'];
        $saleName=$row['saleName'];
        $Price=$row['Price'];
        $quantity=$row['quantity'];
        $Amount=$row['Amount'];
        


        echo "<tr>
        <td>$saleName</td>
        <td>$quantity</td>
        <td>$Price</td>
        <td>$Amount</td>
        <td class='p-1'>
            <button class='btn btn-primary'><i class='fas fa-edit'></i></button>
            <button class='btn btn-danger'> <i class='fas fa-times'></i></button>
        </td>
        </tr>";
    }
}

?>
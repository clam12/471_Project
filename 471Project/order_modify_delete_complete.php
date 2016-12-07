<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Modify Order</title>
    </head>
    <body>
        <?php
        // Create Connection
        $servername="localhost";
        $username="root";
        $password="password";
        $dbname="inventory";
        
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        $orderID = $_POST['order_id'];
        $partID = $_POST['part_id'];
        $quantity = $_POST['quantity'];
        
        $sql1 = "SELECT `Quantity` FROM `order_details` WHERE order_id = '$orderID' AND part_id = '$partID';";
        $result1 = $conn->query($sql1);
        $row1 = $result1->fetch_assoc();
        $orderQuantity = $row1['Quantity'];
        
        if(($quantity > $orderQuantity) || Empty($quantity)) {
            echo "Invalid quantity given";
        } else if ($quantity == $orderQuantity) {
          $sql1 = "SELECT `stock` FROM `part` WHERE part_id = '$partID'";
          $result1 = $conn->query($sql1);
          $row1 = $result1->fetch_assoc();
          $stock = $row1['stock'];
          
          $newStock = $stock + $quantity;
          
          $sql2 = "UPDATE part SET stock = '$newStock' WHERE part_id = '$partID'";
          $conn->query($sql2);
          
          $sql3 = "DELETE FROM `order_details` WHERE order_id = '$orderID' AND part_id = '$partID'";
          $conn->query($sql3);
          
          echo "Part Removed From Order<br>";
          
        } else if ($quantity < $orderQuantity) {
          $sql1 = "SELECT stock FROM part WHERE part_id = '$partID'";
          $result1 = $conn->query($sql1);
          $row1 = $result1->fetch_assoc();
          $stock = $row1['stock'];
          
          $newStock = $stock + $quantity;
          
          $sql2 = "UPDATE part SET stock = '$newStock' WHERE part_id = '$partID'";
          $conn->query($sql2);
          
          $newQuantity = $orderQuantity - $quantity;
          
          $sql3 = "UPDATE `order_details` SET quantity = '$newQuantity' WHERE order_id = '$orderID' AND part_id = '$partID'";
          $conn->query($sql3);
          
          echo "Part Quantity From Order Updated<br>";
        }
        
        $conn->close();
        ?>

        <br><a href="orders.php">Back to Orders</a><br>

    </body>
</html>

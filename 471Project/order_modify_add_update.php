<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
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
        
        $sql1 = "SELECT `stock` FROM `part` WHERE part_id = '$partID';";
        $result1 = $conn->query($sql1);
        $row1 = $result1->fetch_assoc();
        $stockQuantity = $row1['stock'];
        
        if(($quantity > $stockQuantity) || Empty($quantity)) {
            echo "Invalid quantity given";
        } else if ($quantity <= $stockQuantity) {
          $sql1 = "SELECT `Quantity` FROM `order_details` WHERE part_id = '$partID' AND order_id = '$orderID'";
          $result1 = $conn->query($sql1);
          $row1 = $result1->fetch_assoc();
          $orderQuantity = $row1['Quantity'];
          
          $newQuantity = $orderQuantity + $quantity;
          $newStock = $stockQuantity - $quantity;
          
          $sql2 = "UPDATE `order_details` SET `Quantity` = '$newQuantity' WHERE part_id = '$partID' AND order_id = '$orderID'";
          $conn->query($sql2);
          
          $sql3 = "UPDATE `part` SET `stock` = '$newStock' WHERE part_id = '$partID'";
          $conn->query($sql3);
          
          echo "Part Quantity From Order Updated<br>";
          
        }
        
        $conn->close();
        ?>
        
        <br><a href="orders.php">Back to Orders</a><br>
    </body>
</html>

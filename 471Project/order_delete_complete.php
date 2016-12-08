<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Order Deleted</title>
    </head>
    <h1>Order Removed</h1>
    <body>
        <?php
        // Create connection
        $servername="localhost";
        $username="root";
        $password="password";
        $dbname="inventory";
        
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        $order_id = $_POST['order_id'];
        
        $sql = "SELECT * FROM order_details AS o WHERE o.order_id= '$order_id'";
        $result = $conn->query($sql);
        if($result->num_rows == 0) {
            if (empty($order_id)) {
                echo "Error: order ID is empty";
            } else {
                $sql = "DELETE FROM `order` WHERE order_id = '$order_id'";
                $conn->query($sql); 
            }
        }
        else if ($result->num_rows > 0) {
            
            while($row = $result->fetch_assoc()) {
                $part_id = $row['part_id'];
                $quantity = $row['Quantity'];
                
                $sql1 = "SELECT `stock` FROM `part` WHERE part_id = '$part_id'";
                $result1 = $conn->query($sql1);
                $row1 = $result1->fetch_assoc();
                $stock = $row1['stock'];
                
                $newStock = $stock + $quantity;
                
                $sql4 = "UPDATE `part` SET `stock` = '$newStock' WHERE part_id = '$part_id'";
                $conn->query($sql4);
                
                $sql5 = "DELETE FROM `order_details` WHERE order_id = '$order_id' AND part_id = '$part_id'";
                $conn->query($sql5);         
            }
            $sql = "DELETE FROM `order` WHERE order_id = '$order_id'";
            $conn->query($sql); 
        }
        
        $conn->close();
        #echo "<meta http-equiv=\"Refresh\" content=\"2; orders.php\">";
        ?>
        
        <br> <a href="orders.php">Return to Orders</a><br>
    </body>
</html>

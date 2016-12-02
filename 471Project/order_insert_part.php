<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Add Part To Order</title>
    </head>
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
        
        $order_no = $_POST['number'];
        $part_no = $_POST['part'];
        $quantity = $_POST['quantity'];
        
        echo $order_no;
        echo $part_no;
        echo $quantity;
        
        if (empty($quantity)) {
            echo "Error: No quantity given";
        } else {
            $sql = "SELECT stock FROM part WHERE part_id = '$part_no'";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            $stock = $row['stock'];
            
            if($stock < $quantity) {
                echo "Not Enough Stock Available";
            } else {
                $sql = "INSERT INTO order_details (order_id, part_id, quantity) VALUES ('$order_no', '$part_no', '$quantity')";
                $conn->query($sql);
                $newStock = $stock - $quantity;
                $sql1 = "UPDATE part SET stock= '$newStock' WHERE part_id = '$part_no'";
                $conn->query($sql1);
            }
            
        $conn->close();
        
        echo "Part Added to Cart";
        }
        ?>
        <br> <a href="order_add_more_parts.php">Add more parts</a> <br>
        <br> <a href="order_add_complete.php">Submit Order</a> <br>
    </body>
</html>

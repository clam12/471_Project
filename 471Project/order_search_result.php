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
        
        $customerName = $_POST["name"];
        
        $sql1 = "SELECT * FROM `part`";
        $result1 = $conn->query($sql1);
        
        if ($result1->num_rows > 0) {
            echo "<table><tr><th>part_id</th><th>part_name</th><th>company_name</th><th>price</th><th>stock</th><th>location</th></tr>";
            // output data of each row
            while($row1 = $result1->fetch_assoc()) {
                echo "<tr><td>".$row1["part_id"]."</td><td>".$row1["part_name"]."</td><td>".$row1["company_name"]."</td><td>".$row1["price"]."</td><td>".$row1["stock"]."</td><td>".$row1["location"]."</td></tr>";
            }
            echo "</table>";
        } else {
            echo "No Parts";
        }
        
        $sql2 = "SELECT `customer_id` FROM `customers` WHERE name = '$customerName'";
        $result2 = $conn->query($sql2);
        $row2 = $result2->fetch_assoc();
        $customerID = $row2['customer_id'];
        
        $sql3 = "SELECT `order_id` FROM `order` WHERE customer_id = '$customerID'";
        $result3 = $conn->query($sql3);
        $row3 = $result3->fetch_assoc();
        $orderID = $row3['order_id'];
        
        $sql4 = "SELECT * FROM `order_details` WHERE order_id = '$orderID'";
        $result4 = $conn->query($sql4);
        if ($result4->num_rows > 0) {
            echo "<table><tr><th>Order Id</th><th>Part ID</th><th>Quantity</th></tr>";
            // output data of each row
            while($row4 = $result4->fetch_assoc()) {
                echo "<tr><td>".$row4["order_id"]."</td><td>".$row4["part_id"]."</td><td>".$row4["Quantity"]."</td></tr>";
            }
            echo "</table>";
        } else {
            echo "0 results";
        }
        
        $conn->close()
        ?>
        
        <br><a href="orders.php">Back to Orders</a> <br>
    </body>
    
</html>

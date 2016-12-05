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
        
        $sql1 = "SELECT o.order_id, o.part_id, o.quantity, p.part_name, p.company_name, p.price, p.stock, p.location, p.part_type FROM order_details as o JOIN part as p ON o.part_id = p.part_id WHERE order_id = '$orderID'";
        $result1 = $conn->query($sql1);
        
        if ($result1->num_rows > 0) {
            echo "<table><tr><th>order_id</th><th>part_id</th><th>quantity</th><th>part_name</th><th>company_name</th><th>price</th><th>stock</th><th>location</th><th>part_type</th></tr>";
            // output data of each row
            while($row1 = $result1->fetch_assoc()) {
                echo "<tr><td>".$row1["order_id"]."</td><td>".$row1["part_id"]."</td><td>".$row1["quantity"]."</td><td>".$row1["part_name"]."</td><td>".$row1["company_name"]."</td><td>".$row1["price"]."</td><td>".$row1["stock"]."</td><td>".$row1["location"]."</td><td>".$row1["part_type"]."</td></tr>";
            }
            echo "</table>";
        } else {
            echo "No Orders";
        }
        ?>
        
        <br> <a href="orders.php">Back</a> <br>
    </body>
</html>

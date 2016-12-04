<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Add Part</title>
    </head>
    <h1>Which Part Would You Like To Add?</h1>
    <body>
        <?php
        // Create connection
        $servername="localhost";
        $username="root";
        $password="password";
        $dbname="inventory";
        
        $conn = new mysqli($servername, $username, $password, $dbname);
        if($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        $sql1 = "SELECT * FROM part";
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
        echo "<form action='order_insert_part.php' method='post'>";
        
        $sql2 = "SELECT MAX(order_id) FROM `order`";
        $result2 = $conn->query($sql2);
        $row2 = $result2->fetch_assoc();
        $current_order_no = $row2['order_id'];
        
        echo "Your Order ID is '$current_order_no'<br>";
        
        echo "Part ID: <input type ='text' name='part'><br>";
        echo "Quantity: <input type ='text' name='quantity'><br>";
        
        echo "<input type='submit' value='Add to order'><br>";
        echo "<\form>";
        
        $conn->close();
        
        ?>
        <br> <a href="order_add_complete.php">Submit Order</a> <br>
    </body>
</html>

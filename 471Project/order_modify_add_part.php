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
    <h1>Add Part to Current Order</h1>
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
        
        $sql1 = "SELECT * FROM PART as p WHERE p.part_id NOT IN (SELECT o.part_id FROM order_details as o WHERE order_id = $orderID)";
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
    
        echo "<form action='order_modify_add_complete.php' method='post'>";
        echo "<br> Order ID: <input type='text' name='order_id' value = $orderID readonly>";
        
        $sql6 = "SELECT * FROM PART as p WHERE p.part_id NOT IN (SELECT o.part_id FROM order_details as o WHERE order_id = $orderID) ORDER BY p.part_id";
        $result6 = $conn->query($sql6);
        echo "<br>Part ID: <select name='part_id'>";      
        while ($row6 = $result6->fetch_assoc()) {
            $partID2 = $row6['part_id'];
            echo "<option value= '$partID2' >" .$partID2. "</option>";
        }
        echo "</select><br>";
        
        echo "Quantity: <input type ='text' name='quantity'><br>";
        
        echo "<input type='submit' value='Add to Order'><br>";
        echo "</form>";
        
        
        ?>
        
        <br><a href="orders.php">Back to Orders</a> <br>
    </body>
</html>

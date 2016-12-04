<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Remove Part</title>
    </head>
    <h1>Select part you wish to remove from order</h1>
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
        
        echo "<form action='order_modify_delete_complete.php' method='post'>";
        $orderID = $_POST['order_id'];
        
        $sql1 = "SELECT * FROM order_details WHERE order_id ='$orderID'";
        $result1 = $conn->query($sql1);
        
        if ($result1->num_rows > 0) {
            echo "<table><tr><th>order_id</th><th>part_id</th><th>quantity</th></tr>";
            // output data of each row
            while($row1 = $result1->fetch_assoc()) {
                echo "<tr><td>".$row1["order_id"]."</td><td>".$row1["part_id"]."</td><td>".$row1["Quantity"]."</td></tr>";
            }
            echo "</table>";
        } else {
            echo "No Orders";
        }
        
        $sql2 = "SELECT `order_id` FROM `order_details` WHERE `order_id` = '$orderID'";
        $result2 = $conn->query($sql2);
        echo "Order ID: <select name='order_id'>";
        while ($row2 = $result2->fetch_assoc()) {
            $order_id = $row2['order_id'];
            echo "<option value= '$order_id' >" .$order_id. "</option>";
        }
        
        echo "</select><br>";
        
        
        $sql3 = "SELECT `part_id` FROM `order_details` WHERE `order_id` = '$orderID'";
        $result3 = $conn->query($sql3);
        echo "Part ID: <select name='part_id'>";
        
        while ($row3 = $result3->fetch_assoc()) {
            $partID = $row3['part_id'];
            echo "<option value= '$partID' >" .$partID. "</option>";
        }
        
        echo "</select><br>";
        
        echo "Quantity: <input type ='text' name='quantity'><br>";
        
        echo "<input type='submit' value='Submit Change'>";
        echo "</form>";
        
        $conn->close();
        
        ?>
        
        <br><a href="orders.php">Back to Orders</a> <br>
    </body>
</html>

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
        
        
        $sql2 = "SELECT * FROM order_details WHERE order_id ='$orderID'";
        $result2 = $conn->query($sql2);
        
        if ($result2->num_rows > 0) {
            echo "<table><tr><th>order_id</th><th>part_id</th><th>quantity</th></tr>";
            // output data of each row
            while($row2 = $result2->fetch_assoc()) {
                echo "<tr><td>".$row2["order_id"]."</td><td>".$row2["part_id"]."</td><td>".$row2["Quantity"]."</td></tr>";
            }
            echo "</table>";
        } else {
            echo "No Orders";
        }
        
        echo "<br>Add Quantity to Existing Part<br>";
        
        echo "<form action='order_modify_add_update.php' method='post'>";
        
        $sql3 = "SELECT `order_id` FROM `order_details` WHERE `order_id` = '$orderID'";
        $result3 = $conn->query($sql3);
        echo "Order ID: <select name='order_id'>";
        while ($row3 = $result3->fetch_assoc()) {
            $order_id = $row3['order_id'];
            echo "<option value= '$order_id' >" .$order_id. "</option>";
        }
        
        echo "</select><br>";
        
        
        $sql4 = "SELECT `part_id` FROM `order_details` WHERE `order_id` = '$orderID'";
        $result4 = $conn->query($sql4);
        echo "Part ID: <select name='part_id'>";
        
        while ($row4 = $result4->fetch_assoc()) {
            $partID = $row4['part_id'];
            echo "<option value= '$partID' >" .$partID. "</option>";
        }
        
        echo "</select><br>";
        
        echo "Quantity: <input type ='text' name='quantity'><br>";
        
        echo "<input type='submit' value='Submit Change'><br>";
        echo "</form>";
        
        echo "<form action='order_modify_add_insert.php' method='post'>";
                
        echo "<br>Add Part to Current Order<br>";
        
        
        $sql5 = "SELECT `order_id` FROM `order_details` WHERE `order_id` = '$orderID'";
        $result5 = $conn->query($sql2);
        echo "Order ID: <select name='order_id'>";
        while ($row5 = $result5->fetch_assoc()) {
            $order_id2 = $row5['order_id'];
            echo "<option value= '$order_id2' >" .$order_id2. "</option>";
        }
        
        
        echo "</select><br>";
        
        $sql6 = "SELECT `part_id` FROM `part` ORDER BY part_id";
        $result6 = $conn->query($sql6);
        echo "Part ID: <select name='part_id'>";
        
        while ($row6 = $result6->fetch_assoc()) {
            $partID2 = $row6['part_id'];
            echo "<option value= '$partID2' >" .$partID2. "</option>";
        }
        
        echo "</select><br>";
        
        echo "Quantity: <input type ='text' name='quantity'><br>";
        
        echo "<input type='submit' value='Submit Change'><br>";
        echo "</form>";
        
        
        ?>
        
        <br><a href="orders.php">Back to Orders</a> <br>
    </body>
</html>

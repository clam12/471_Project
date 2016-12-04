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
        
        $customerName =$_POST['customerName'];
        
        $sql1 = "SELECT customer_id FROM customers WHERE name = '$customerName'";
        $result1 = $conn->query($sql1);
        $row1 = $result1->fetch_assoc();
        $customer_id = $row1['customer_id'];
        
        $sql2 = "SELECT order_id, date FROM `order` WHERE customer_id = '$customer_id'";
        $result2 = $conn->query(sql2);
        if ($result2->num_rows > 0) {
            echo"<table><tr><th>order_id</th><th>date</th><th>time</th></tr>";
            //output data of each row
            while($row2 = $result2->fetch_assoc()) {
                echo "<tr><td>".$row2["order_id"]."</td><td>".$row2["date"]."</td></td>";
            }
        }
        
        echo "<form action='order_modify_add_part.php' method='post'>";
        $sql3 = "SELECT order_id FROM `order` WHERE customer_id = '$customer_id'";
        $result3 = $conn->query($sql3);
        echo "Order ID: <select name= 'order_id'>";
        
        while ($row3 = $result3->fetch_assoc()) {
            $orderID = $row3['order_id'];
            echo "<option value= '$orderID' >" .$orderID. "</option>";
        }
        
        echo "</select><br>";
        
        echo "<br><input type='submit' value='Select Part from Order'>";
        echo "</form>";
        
        $conn->close();
        
        ?>
        
        <br><a href="orders.php">Back to Orders</a> <br>
    </body>
</html>

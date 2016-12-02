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
        
        $keyword = $_POST["keyword"];
        $sql = "SELECT * FROM `order` WHERE order_id = $keyword OR customer_id = $keyword";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            echo "<table><tr><th>Order Id</th><th>Customer ID</th><th>Employee ID</th><th>Date</th><th>Time</th></tr>";
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>".$row["order_id"]."</td><td>".$row["customer_id"]."</td><td>".$row[employee_id]."</td><td>".$row[date]."</td><td>".$row[time]."</td></tr>";
            }
            echo "</table>";
        } else {
            echo "0 results";
        }
        $conn->close();
        
        ?>
        <br> <a href="orders.php">Back</a> <br>
        
    </body>
</html>

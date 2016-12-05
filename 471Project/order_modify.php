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
    <h1>Modify Order</h1>
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
        
        $sql = "SELECT o.order_id, o.customer_id, o.employee_id, o.date, o.time, c.name, c.email, c.phone_number FROM `order` AS o JOIN `customers`as c ON o.customer_id = c.customer_id ORDER BY o.order_id";
        $result = mysqli_query($conn, $sql);
        if ($result->num_rows > 0) {
            echo "<table><tr><th>Order ID</th><th>Customer ID</th><th>Employee ID</th><th>Date</th><th>Time</th><th>Name</th><th>Email</th><th>Phone Number</th></tr>";
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo"<tr><td>".$row["order_id"]."</td><td>".$row["customer_id"]."</td><td>".$row[employee_id]."</td><td>".$row[date]."</td><td>".$row[time]."</td><td>".$row[name]."</td><td>".$row[email]."</td><td>".$row[phone_number]."</td></tr>";
            }
            echo"</table>";
        } else {
            echo "0 results";
        }
        
        echo "<br>";
        echo "<form action='order_modify_select_order.php' method='post'>";
        $sql1 = "SELECT `name` FROM `customers` ";
        $result1 = $conn->query($sql1);
        echo "Customer Name: <select name= 'customerName'>";
        
        while ($row1 = $result1->fetch_assoc()) {
            $customerName = $row1['name'];
            echo "<option value= '$customerName' >" .$customerName. "</option>";
        }
        
        echo "</select><br>";
        echo "<br><input type='submit' value='Next'>";
        echo "</form>";
        ?>
        
        <br><a href="orders.php">Return to Orders</a><br>
    </body>
</html>

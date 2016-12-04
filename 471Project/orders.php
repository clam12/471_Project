<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Orders</title>
    </head>
    <h1> Orders </h1>
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
        
        $sql = "SELECT * FROM `order`";
        $result = mysqli_query($conn, $sql);
        if ($result->num_rows > 0) {
            echo "<table><tr><th>Order ID</th><th>Customer ID</th><th>Employee ID</th><th>Date</th><th>Time</th></tr>";
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo"<tr><td>".$row["order_id"]."</td><td>".$row["customer_id"]."</td><td>".$row[employee_id]."</td><td>".$row[date]."</td><td>".$row[time]."</td></tr>";
            }
            echo"</table>";
        } else {
            echo "0 results";
        }
        $conn->close();
        
        ?>
        <br>
        <form action="order_search.php" method="post">
            <input type="text" name="keyword">
            <input type="submit" value="Search">
        </form>
        <br>
        
        <a href="order_add_V2.php">Add new order</a> <br>
        <a href="order_delete.php">Delete existing order</a> <br>
        <a href="order_modify.php">Modify existing order</a> <br>
        <a href="welcome.php">Back</a> <br>
    </body>
</html>

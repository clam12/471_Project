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
        
        $sql = "SELECT o.order_id, o.customer_id, o.employee_id, o.date, o.time, c.name, c.email, c.phone_number "
                . "FROM `order` AS o JOIN `customers`as c ON o.customer_id = c.customer_id "
                . "ORDER BY o.order_id";
        $result = mysqli_query($conn, $sql);
        if ($result->num_rows > 0) {
            echo "<table><tr>"
                    . "<th>Order ID</th>"
                    . "<th>Customer ID</th>"
                    . "<th>Employee ID</th>"
                    . "<th>Date</th>"
                    . "<th>Time</th>"
                    . "<th>Name</th>"
                    . "<th>Email</th>"
                    . "<th>Phone Number</th"
                    . "></tr>";
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo"<tr>"
                . "<td>".$row["order_id"]."</td>"
                        . "<td>".$row["customer_id"]."</td>"
                        . "<td>".$row[employee_id]."</td>"
                        . "<td>".$row[date]."</td>"
                        . "<td>".$row[time]."</td>"
                        . "<td>".$row[name]."</td"
                        . "><td>".$row[email]."</td>"
                        . "<td>".$row[phone_number]."</td>"
                        . "</tr>";
            }
            echo"</table>";
        } else {
            echo "0 results";
        }
        
        echo "<br>";
        echo "<form action='order_search_result.php' method='post'>";
        echo "<input type='text' name='keyword'>";
        echo "<input type='submit' value='Search'>";
        echo "</form>";

        echo "<form action='order_details.php' method='post'>";
        $sql3 = "SELECT order_id FROM `order` ORDER BY order_id";
        $result3 = $conn->query($sql3);
        echo "Order ID: <select name= 'order_id'>";
        
        while ($row3 = $result3->fetch_assoc()) {
            $orderID = $row3['order_id'];
            echo "<option value= '$orderID' >" .$orderID. "</option>";
        }
        
        echo "</select>";
        echo "<input type='submit' value='View Details'>";
        echo "</form>";
        
        $conn->close();
        
        ?>

        
        <a href="order_add.php">Add new order</a> <br>
        <a href="order_delete.php">Delete existing order</a> <br>
        <a href="order_modify.php">Modify existing order</a> <br>
        <a href="welcome.php">Back</a> <br>
    </body>
</html>

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
    <h1>Which part would you like to add?</h1>
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
        
        $customerName = $_POST['customerName'];
        $employeeName = $_POST['employeeName'];
        date_default_timezone_set("MST");
        
        $date = date('Y-m-d');
        $time = date('H:i:s');
               
        $sql1 = "SELECT customer_id FROM customers WHERE name = '$customerName'";
        $result1 = $conn->query($sql1);
        $row1 = $result1->fetch_assoc();
        $customer_id = $row1['customer_id'];
        
        $sql2 = "SELECT employee_id FROM employee WHERE name = '$employeeName'";
        $result2 = $conn->query($sql2);
        $row2 = $result2->fetch_assoc();
        $employee_id = $row2['employee_id'];
       
        $sql3 = "INSERT INTO `order` (customer_id, employee_id, date, time) VALUES ('$customer_id', '$employee_id', '$date', '$time')";
        $conn->query($sql3);
        
        $sql4 = "SELECT * FROM part";
        $result4 = $conn->query($sql4);
        
        if ($result4->num_rows > 0) {
            echo "<table><tr><th>part_id</th><th>part_name</th><th>company_name</th><th>price</th><th>stock</th><th>location</th></tr>";
            // output data of each row
            while($row4 = $result4->fetch_assoc()) {
                echo "<tr><td>".$row4["part_id"]."</td><td>".$row4["part_name"]."</td><td>".$row4["company_name"]."</td><td>".$row4["price"]."</td><td>".$row4["stock"]."</td><td>".$row4["location"]."</td></tr>";
            }
            echo "</table>";
        } else {
            echo "No Parts";
        }
        echo "<form action=\"order_insert_part.php\" method=\"post\">";
        
        $sql5 = "SELECT MAX(order_id) FROM `order`";
        $result5 = $conn->query($sql5);
        $row5 = $result5->fetch_assoc();
        $current_order_no = $row5['order_id'];
        
        echo "Your Order ID is '$current_order_no'<br>";
        
        echo "Part ID: <input type =\"text\" name=\"part\"><br>";
        echo "Quantity: <input type =\"text\" name=\"quantity\"><br>";
        
        echo "<input type=\"submit\" value=\"Add to order\"><br>";
        echo "<\form>";
        
        $conn->close();
        
        ?>
        <br> <a href="order_add.php">Return to Order Selection</a> <br>
    </body>
</html>

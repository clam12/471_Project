<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Slect Parts</title>
    </head>
    <body>
        <?php
        session_start();
        $employeeName = $_SESSION["employee_name"];
        $employeePhone = $_SESSION["phone_number"];
        
        // Create connection
        $servername="localhost";
        $username="root";
        $password="password";
        $dbname="inventory";
        
        $conn = new mysqli($servername, $username, $password, $dbname);
        if($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        $sql5 = "SELECT order_id FROM `order` ORDER BY order_id DESC";
        $result5 = $conn->query($sql5);
        $row5 = $result5->fetch_assoc();
        $current_order_no = $row5['order_id']+1;
        $_SESSION['order_number'] = $current_order_no;
        $customerName;
        if(empty($_POST["customer_name"]) || empty($_POST["customer_email"]) || empty($_POST["customer_phone"])){
            $customerName = $_POST["customerName"];
        }else if(!empty($_POST["customer_name"]) && !empty($_POST["customer_email"]) && !empty($_POST["customer_phone"]) && strlen($_POST["customer_phone"]) == 10){
            $customerName = $_POST["customer_name"];
            $customerEmail = $_POST["customer_email"];
            $customerPhone = $_POST["customer_phone"];
            $sql = "INSERT INTO customers (order_id, name, email, phone_number) VALUES ($current_order_no, '$customerName', '$customerEmail', $customerPhone)";
            $conn -> query($sql);
        }
        
        date_default_timezone_set("MST");
        
        $date = date('Y-m-d');
        $time = date('H:i:s');
        
        
        $sql1 = "SELECT customer_id FROM customers WHERE name = '$customerName'";
        $result1 = $conn->query($sql1);
        $row1 = $result1->fetch_assoc();
        $customer_id = $row1['customer_id'];
        
        $sql2 = "SELECT employee_id FROM employee WHERE name = '$employeeName' AND phone_number = $employeePhone";
        $result2 = $conn->query($sql2);
        $row2 = $result2->fetch_assoc();
        $employee_id = $row2['employee_id'];

        $sql3 = "INSERT INTO `order` (order_id, customer_id, employee_id, date, time) VALUES ($current_order_no,'$customer_id', '$employee_id', '$date', '$time')";
        $conn->query($sql3);
        
        $sql4 = "SELECT * FROM part";
        $result4 = $conn->query($sql4);
        
        $sql5 = "INSERT INTO `order_detail` (order_id, customer_id, employee_id, date, time) VALUES ($current_order_no,'$customer_id', '$employee_id', '$date', '$time')";
        $conn->query($sql5);
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
        
        echo "Part ID: <input type =\"text\" name=\"part\"><br>";
        echo "Quantity: <input type =\"text\" name=\"quantity\"><br>";
        
        echo "<input type=\"submit\" value=\"Add to order\"><br>";
        echo "</form>";
        ?>
    </body>
</html>

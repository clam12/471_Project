<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Add Order</title>
        <style>
            .reveal-if-active {
                opacity: 0;
                max-height: 0;
                overflow: hidden;
                font-size: 16px;
                transform: scale(0.8);
                transition: 0.5s;
            }

            input[type="radio"]:checked ~.reveal-if-active {
                opacity: 1;
                max-height: 100px;
                padding: 10px 20px;
                transform: scale(1);
                overflow: visible;
            }

        </style>
    </head>
    <body>
        <?php
        session_start();
        $employeeName = $_SESSION["employee_name"];
        $employee_number = $_SESSION["phone_number"];

        echo "<h1>Creating order for $employeeName</h1>";
        // Create connection
        $servername = "localhost";
        $username = "root";
        $password = "password";
        $dbname = "inventory";

        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        
        echo "<form action=\"order_add_part.php\" method=\"post\">";

        $sql1 = "SELECT `name` FROM `customers` ";
        $result1 = $conn->query($sql1);
        echo "Existing Customer: <select name= 'customerName'>";

        while ($row = $result1->fetch_assoc()) {
            $customerName = $row['name'];
            echo "<option value= '$customerName' >" . $customerName . "</option>";
        }
        echo "</select><br>";
               
        echo "<div>";
            echo "<input type=\"radio\" name=\"customer\" id=\"GPU\">";
            echo "<label for=\"GPU\">New Customer</label>";
            echo "<div class=\"reveal-if-active\">";
                echo "Name: <input type=\"text\" id=\"customerName\" name=\"customer_name\">  <br>";
                echo "Email: <input type=\"text\" id=\"customerEmail\" name=\"customer_email\"> <br>";
                echo "Phone Number:  <input type=\"text\" customerPhone=\"threads\" name=\"customer_phone\"> <br>";
            echo "</div>";
        echo "</div>";

        echo "<input type=\"submit\" value=\"Order\">";
        echo "</form>";
        $conn->close();
        ?>
        <br> <a href="orders.php">Back</a> <br>
    </body>
</html>

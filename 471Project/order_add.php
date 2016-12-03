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
    </head>
    <h1>Add Order</h1>
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
        
        echo "<form action=\"order_add_part.php\" method=\"post\">";
        
        $sql1 = "SELECT `name` FROM `customers` ";
        $result1 = $conn->query($sql1);
        echo "Customer Name: <select name= 'customerName'>";
        
        while ($row = $result1->fetch_assoc()) {
            $customerName = $row['name'];
            echo "<option value= '$customerName' >" .$customerName. "</option>";
        }
        
        echo "</select><br>";
        
        $sql2 = "SELECT `name` FROM `employee` ";
        $result2 = $conn->query($sql2);
        echo "Employee: <select name='employeeName'>";
        
        while ($row = $result2->fetch_assoc()) {
            $employeeName = $row['name'];
            echo "<option value = '$employeeName' >" .$employeeName. "</option>";
        }
        
        echo "</select><br>";

        echo "<input type=\"submit\" value=\"Add Parts\">";
        echo "</form>";
        
        $conn->close();
        
        ?>
        <br> <a href="orders.php">Back</a> <br>
    </body>
</html>

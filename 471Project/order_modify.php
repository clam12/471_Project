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
    <h1>Order Modification</h1>
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
        
        echo "<form action='order_modify_add.php' method='post'>";
        $sql1 = "SELECT `name` FROM `customers` ";
        $result1 = $conn->query($sql1);
        echo "Customer Name: <select name= 'customerName'>";
        
        while ($row1 = $result1->fetch_assoc()) {
            $customerName = $row1['name'];
            echo "<option value= '$customerName' >" .$customerName. "</option>";
        }
        
        echo "</select><br>";
        echo "<br><input type='submit' value='Add Part'><br>";
        echo "</form>";
        
        echo "<form action='order_modify_delete.php' method='post'>";
        $sql1 = "SELECT `name` FROM `customers` ";
        $result1 = $conn->query($sql1);
        echo "<br>Customer Name: <select name= 'customerName'>";
        
        while ($row1 = $result1->fetch_assoc()) {
            $customerName = $row1['name'];
            echo "<option value= '$customerName' >" .$customerName. "</option>";
        }
        
        echo "</select><br>";
        echo "<br><input type='submit' value='Remove Part'>";
        echo "</form>";
        ?>
        
        <br><a href="orders.php">Return to Orders</a><br>
    </body>
</html>

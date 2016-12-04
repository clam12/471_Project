<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Search Orders</title>
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
        
        echo "Who's order would you like to look up?";
        
        echo "<form action='order_search_result.php' method='post'>";
        $sql = "SELECT `name` FROM `customers`";
        $result = $conn->query($sql);
        echo "Customer Name: <select name= 'name'>";
        
        while ($row = $result->fetch_assoc()) {
            $customerName = $row['name'];
            echo "<option value= '$customerName' >" .$customerName. "</option>";
        }
        
        echo "</select><br>";
        
        echo "<br><input type='submit' value='Search'>";
        echo "</form>";
        
        $conn->close();
        
        ?>
        <br> <a href="orders.php">Back</a> <br>
        
    </body>
</html>

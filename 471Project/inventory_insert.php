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
    <h1>Add New Item</h1>
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
        
        echo "<form action=\"inventory_insert_complete.php\" method=\"post\">";
        echo "Name: <input type=\"text\" name=\"name\"><br>";
        
        $sql = "SELECT company_name FROM manufacturer ";
        $result = $conn->query($sql);
        echo "Manufacturer: <select name='manufacturer'>";
        
        while ($row = $result->fetch_assoc()) {
            $name = $row['company_name'];
            echo "<option value= '$name' >" .$name. "</option>";
        }
        
        echo "</select><br>";
        echo "Price: <input type =\"text\" name=\"price\"><br>";
        echo "Stock: <input type =\"text\" name=\"stock\"><br>";
        echo "Location: <input type =\"text\" name=\"location\"><br>";
        echo "<input type=\"submit\" value=\"Insert\">";
        echo "</form>";
        
        $conn->close();
        
        ?>
        <br> <a href="inventory.php">Back</a> <br>
    </body>
</html>

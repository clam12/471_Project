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
    <h1>Modify Part</h1>
    <body>
        <?php
        $part_id = $_POST['part_id'];
        
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

        $keyword = $_POST["keyword"];
        $sql = "SELECT * FROM part WHERE part_id = $part_id";
        $result = $conn->query($sql);

       
        
        
        $row = $result->fetch_assoc();
        $name = $row['part_name'];
        $manu = $row['company_name'];
        $price = $row['price'];
        $stock = $row['stock'];
        $loca = $row['location'];
        
        echo "<form action=\"inventory_modify_complete.php\" method=\"post\">";
        echo "Part name: <input type=\"text\" name=\"part_name_field\" value='$name'> <br>";
        $sql = "SELECT company_name FROM manufacturer ";
        $result = $conn->query($sql);
        echo "Manufacturer: <select name='manufacturer'>";
        
        while ($row = $result->fetch_assoc()) {
            $name = $row['company_name'];
            if ($name == $manu){
                echo "<option value='$name' selected='selected'>" .$name. "</option>";
            } else {
                echo "<option value= '$name' >" .$name. "</option>";  
            }
        }
        echo "</select> <br>";
        echo "Price: <input type=\"text\" name=\"price_field\" value='$price'><br>";
        echo "Stock: <input type=\"text\" name=\"stock_field\" value=\"$stock\"><br>";        
        echo "Location <input type=\"text\" name=\"location_field\" value='$loca'><br>";
        
        echo "<input type=\"submit\" value=\"Modify\">";
        echo "</form>";
        
        $conn->close();
        
        ?>
        
        <!--
        <form action="inventory_modify_complete.php" method="post">
            <input type="text" name="part_name_field" value=$row["part_name]>
            <input type="submit" value="Modify">
        </form>
        -->
    </body>
</html>

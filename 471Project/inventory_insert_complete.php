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
        
        $name = $_POST['name'];
        $manu = $_POST['manufacturer'];
        $price = $_POST['price'];
        $stock = $_POST['stock'];
        $loca = $_POST['location'];
        
        $sql = "INSERT INTO part (part_name, company_name, price, stock, location) VALUES ('$name','$manu','$price','$stock','$loca')";

        if ($conn->query($sql) === TRUE) {
            echo "New part created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
        ?>
        
        <br> <a href="inventory.php">Back</a> <br>
    </body>
</html>

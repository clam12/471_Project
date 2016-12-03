<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Add Manufacturer</title>
    </head>
    <body>
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "password";
        $dbname = "inventory";

        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        ?>
    </body>
    <form action = "manufacturer_add_complete.php" method = "post">
        Name: <input type = "text" name = "company_name">
        <br>
        Contact Name: <input type = "text" name = "contact_name">
        <br>
        Phone Number: <input type = "text" name = "phone_number">
        <br>
        <input type = "submit" value = "Add">
    </form>
    <a href = "manufacturer.php">Back</a>
</html>

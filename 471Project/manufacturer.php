<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Manufacturer</title>
    </head>
    <body>
        <h1>Manufacturers</h1>
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

        $sql = "SELECT * FROM manufacturer";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table><tr><th>Company Name</th><th>Contact</th><th>phone number</th></tr>";
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["company_name"] . "</td><td>" . $row["contact_name"] . "</td><td>" . $row["phone_number"] . "</td></tr>";
            }
            echo "</table>";
        } else {
            echo "0 results";
        }
        
        
        ?>
    </body>
    <form action = "manufacturer_add.php" method = "post">
        <input type = "submit" value = "Add">
    </form>
    <a href = "inventory.php">Back</a>
</html>

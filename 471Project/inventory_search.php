<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Search Results</title>
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

        $keyword = $_POST["keyword"];
        $sql = "SELECT * FROM part WHERE part_name LIKE '%$keyword%' OR company_name LIKE '%$keyword%'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table><tr><th>part_id</th><th>part_name</th><th>company_name</th><th>price</th><th>stock</th><th>location</th></tr>";
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>".$row["part_id"]."</td><td>".$row["part_name"]."</td><td>".$row["company_name"]."</td><td>".$row["price"]."</td><td>".$row["stock"]."</td><td>".$row["location"]."</td></tr>";
            }
            echo "</table>";
        } else {
            echo "0 results";
        }
        $conn->close();
        
        ?>
        <br> <a href="inventory.php">Back</a> <br>
        
    </body>
</html>

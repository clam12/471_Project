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
        $servername = "localhost";
        $username = "root";
        $password = "password";
        $dbname = "inventory";

        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $component = $_POST["filter_by"];

        if ($component == "CPU") {
            $sql = "SELECT * FROM `part` NATURAL JOIN `cpu`";
        } else if ($component == "GPU") {
            $sql = "SELECT * FROM `part` NATURAL JOIN `gpu`";
        } else if ($component == "HDD") {
            $sql = "SELECT * FROM `part` NATURAL JOIN `hdd`";
        } else if ($component == "PSU") {
            $sql = "SELECT * FROM `part` NATURAL JOIN `psu`";
        } else if ($component == "RAM") {
            $sql = "SELECT * FROM `part` NATURAL JOIN `ram`";    
        } else if ($component == "Other") {
            $sql = "SELECT *
                    FROM part
                    WHERE part_id NOT IN (SELECT part_id FROM cpu)
                    AND part_id NOT IN (SELECT part_id FROM gpu)
                    AND part_id NOT IN (SELECT part_id FROM hdd)
                    AND part_id NOT IN (SELECT part_id FROM ram)
                    AND part_id NOT IN (SELECT part_id FROM psu)";         
        }
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            echo "<table><tr><th>part_id</th><th>part_name</th><th>company_name</th><th>price</th><th>stock</th><th>location</th>";
            if ($component == "CPU") {
                echo "<th>clock speed</th><th>cores</th><th>threads</th></tr>";
            } else if ($component == "GPU") {
                echo "<th>vram</th><th>clock_speed</th></tr>";
            } else if ($component == "HDD") {
                echo "<th>capacity</th><th>rpm</th></tr>";
            } else if ($component == "PSU") {
                echo "<th>wattage</th><th>modularity</th><th>rating</th></tr>";
            } else if ($component == "RAM"){
                echo "<th>size</th><th>speed</th><th>architecture</th></tr>";
            }
                  
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["part_id"] . "</td><td>" . $row["part_name"] . "</td><td>" . $row["company_name"] . "</td><td>" . $row["price"] . "</td><td>" . $row["stock"] . "</td><td>" . $row["location"] . "</td>";
                if ($component == "CPU") {
                    echo "<td>" . $row["clock_speed"] . "</td><td>" . $row["cores"] . "</td><td>" . $row["threads"] . "</td></tr>";
                } else if ($component == "GPU") {
                    echo "<td>" . $row["vram"] . "</td><td>" . $row["clock_speed"]."</td></tr>";
                } else if ($component == "HDD") {
                    echo "<td>" . $row["capacity"] . "</td><td>" . $row["rpm"]."</td></tr>";
                } else if ($component == "PSU") {
                    echo "<td>" . $row["wattage"] . "</td><td>" . $row["modularity"]."</td><td>" . $row["rating"] . "</td></tr>";
                } else if ($component == "RAM") {
                    echo "<td>" . $row["size"] . "</td><td>" . $row["speed"]."</td><td>" . $row["architecture"] . "</td></tr>";
                }
            }
            echo "</table>";
        } else {
            echo "0 results";
        }
        $conn->close();
        ?>
        <br> 
        <a href="inventory.php">Back</a> 
        <br>
    </body>
</html>

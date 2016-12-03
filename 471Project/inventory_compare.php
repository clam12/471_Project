<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Compare Results</title>
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

        $firstPart = $_POST["firstPart"];
        $secondPart = $_POST["secondPart"];
        $component = $_POST["compare_by"];

        if ($component == "CPU") {
            $sql2 = "SELECT part.part_id, part.part_name, part.company_name, part.price, part.stock, part.location, cpu.clock_speed, cpu.cores, cpu.threads FROM part INNER JOIN cpu ON "
                    . "(part.part_id = $firstPart OR part.part_id = $secondPart) AND part.part_id = cpu.part_id";
        } else if ($component == "GPU") {
            $sql2 = "SELECT part.part_id, part.part_name, part.company_name, part.price, part.stock, part.location, gpu.vram, gpu.clock_speed FROM part INNER JOIN gpu ON "
                    . "(part.part_id = $firstPart OR part.part_id = $secondPart) AND part.part_id = gpu.part_id ";
        } else if ($component == "HDD") {
           $sql2 = "SELECT part.part_id, part.part_name, part.company_name, part.price, part.stock, part.location, hdd.capacity, hdd.rpm FROM part INNER JOIN hdd ON "
                    . "(part.part_id = $firstPart OR part.part_id = $secondPart) AND part.part_id = hdd.part_id ";
        } else if ($component == "PSU") {
            $sql2 = "SELECT part.part_id, part.part_name, part.company_name, part.price, part.stock, part.location, psu.wattage, psu.modularity, psu.rating FROM part INNER JOIN psu ON "
                    . "(part.part_id = $firstPart OR part.part_id = $secondPart) AND part.part_id = psu.part_id ";
        } else {
            //RAM
            $sql2 = "SELECT part.part_id, part.part_name, part.company_name, part.price, part.stock, part.location, ram.size, ram.speed, ram.architecture FROM part INNER JOIN ram ON "
                    . "(part.part_id = $firstPart OR part.part_id = $secondPart) AND part.part_id = ram.part_id";
        }
        $result2 = $conn->query($sql2);
        if ($result2->num_rows > 0) {
            echo "<table><tr><th>part_id</th><th>part_name</th><th>company_name</th><th>price</th><th>stock</th><th>location</th>";
            if ($component == "CPU") {
                echo "<th>clock speed</th><th>cores</th><th>threads</th></tr>";
            } else if ($component == "GPU") {
                echo "<th>vram</th><th>clock_speed</th></tr>";
            } else if ($component == "HDD") {
                echo "<th>capacity</th><th>rpm</th></tr>";
            } else if ($component == "PSU") {
                echo "<th>wattage</th><th>modularity</th><th>rating</th></tr>";
            } else {
                echo "<th>size</th><th>speed</th><th>architecture</th></tr>";
            }
            
            // output data of each row
            while ($row = $result2->fetch_assoc()) {
                echo "<tr><td>" . $row["part_id"] . "</td><td>" . $row["part_name"] . "</td><td>" . $row["company_name"] . "</td><td>" . $row["price"] . "</td><td>" . $row["stock"] . "</td><td>" . $row["location"] . "</td>";
                if ($component == "CPU") {
                    echo "<td>" . $row["clock_speed"] . "</td><td>" . $row["cores"] . "</td><td>" . $row["threads"] . "</td></tr>";
                } else if ($component == "GPU") {
                    echo "<td>" . $row["vram"] . "</td><td>" . $row["clock_speed"]."</td></tr>";
                } else if ($component == "HDD") {
                    echo "<td>" . $row["capacity"] . "</td><td>" . $row["rpm"]."</td></tr>";
                } else if ($component == "PSU") {
                    echo "<td>" . $row["wattage"] . "</td><td>" . $row["modularity"]."</td><td>" . $row["rating"] . "</td></tr>";
                } else {
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

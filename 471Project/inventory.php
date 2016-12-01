<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Inventory</title>
    </head>
    <h1> Inventory </h1>
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

        $sql = "SELECT * FROM part";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table><tr><th>part_id</th><th>part_name</th><th>company_name</th><th>price</th><th>stock</th><th>location</th></tr>";
            // output data of each row
<<<<<<< HEAD
            while($row = $result->fetch_assoc()) {
				echo "<tr><td>" . $row["part_id"] . "</td><td>" . $row["part_name"] . "</td><td>" . $row["company_name"] . "</td><td>" . $row["price"] . "</td><td>" . $row["stock"] . "</td><td>" . $row["location"] . "</td></tr>";
=======
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["part_id"] . "</td><td>" . $row["part_name"] . "</td><td>" . $row["company_name"] . "</td><td>" . $row["price"] . "</td><td>" . $row["stock"] . "</td><td>" . $row["location"] . "</td></tr>";
>>>>>>> 33a47ba3c79dde836e301fb835f105e44d063b13
            }
            echo "</table>";
        } else {
            echo "0 results";
        }
        $conn->close();
        ?>
        <br>
        <form action="inventory_search.php" method="post">
            <input type="text" name="keyword">
            <input type="submit" value="Search">
        </form>
        <form action = "inventory_compare.php" method = "post">
            First part_id: <input type = "text" name = "firstPart">
            Second part_id: <input type = "text" name = "secondPart">
            CPU<input type="radio" name="radio" value="CPU">
            GPU<input type="radio" name="radio" value="GPU">
            HDD<input type="radio" name="radio" value="HDD">
            PSU<input type="radio" name="radio" value="PSU">
            RAM<input type="radio" name="radio" value="RAM">       
            <input type = "submit" value = Compare>
        </form>
<<<<<<< HEAD
    </body>
</html>

            }
            echo "</table>";
        } else {
            echo "0 results";
        }
        $conn->close();
        
        ?>
        <br>
        <form action="inventory_search.php" method="post">
            <input type="text" name="keyword">
            <input type="submit" value="Search">
        </form>
        <form action = "inventory_compare.php" method = "post">
            First part_id: <input type = "text" name = "firstPart">
            Second part_id: <input type = "text" name = "secondPart">
            CPU<input type="radio" name="radio" value="CPU">
            GPU<input type="radio" name="radio" value="GPU">
            HDD<input type="radio" name="radio" value="HDD">
            PSU<input type="radio" name="radio" value="PSU">
            RAM<input type="radio" name="radio" value="RAM">       
            <input type = "submit" value = Compare>
        </form>
        <a href="inventory_insert.php">Insert new item</a> <br>
        <a href="welcome.php">Back</a> <br>
=======
>>>>>>> 33a47ba3c79dde836e301fb835f105e44d063b13
    </body>
</html>

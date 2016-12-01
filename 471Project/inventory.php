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
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["part_id"] . "</td><td>" . $row["part_name"] . "</td><td>" . $row["company_name"] . "</td><td>" . $row["price"] . "</td><td>" . $row["stock"] . "</td><td>" . $row["location"] . "</td></tr>";
            }
            echo "</table>";
        } else {
            echo "0 results";
        }
        $conn->close();
        ?>
        <br>
        
        <h3>Search</h3>
        <form action="inventory_search.php" method="post">
            <input type="text" name="keyword">
            <input type="submit" value="Search">
        </form>
        
        <h3>Filter</h3>        
        <form action="inventory_filter.php" method="post"> 
            <select name="filter_by">
                <option value="CPU">CPU</option>
                <option value="GPU">GPU</option>
                <option value="HDD">HDD</option>
                <option value="PSU">PSU</option>
                <option value="RAM">RAM</option>
                <option>Other</option>
            </select>
            <input type="submit" value="Filter">
        </form>
        
        <h3>Compare</h3>
        <form action = "inventory_compare.php" method = "post">
            First part_id: <input type = "text" name = "firstPart">
            Second part_id: <input type = "text" name = "secondPart">
            <select name="compare_by">
                <option value="CPU">CPU</option>
                <option value="GPU">GPU</option>
                <option value="HDD">HDD</option>
                <option value="PSU">PSU</option>
                <option value="RAM">RAM</option>
            </select>     
            <input type = "submit" value ="Compare">
        </form>
        
        <h3>Modify</h3>        
        <form action="inventory_modify.php" method="post">
            Part_id: <input type="text" name="part_id">
            <input type="submit" value="Modify">
        </form>
        
        <h3>Insert</h3>       
        <form action="inventory_insert.php" method="post">
            <input type="submit" value="Insert New Part">
        </form> 
        <br> <a href="welcome.php">Back</a> <br>
    </body>
</html>

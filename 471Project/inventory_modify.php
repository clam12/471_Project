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

        $sql = "SELECT * FROM part WHERE part_id = $part_id";
        $result = $conn->query($sql);
       
        $row = $result->fetch_assoc();
        $name = $row['part_name'];
        $manu = $row['company_name'];
        $price = $row['price'];
        $stock = $row['stock'];
        $loca = $row['location'];
        $type = $row['part_type'];
        
        echo "<form action='inventory_modify_complete.php' method='post'>";
        echo "Part_id: <input type='text' name='part_id_field' value='$part_id' readonly> <br>";
        echo "Part name: <input type='text' name='part_name_field' value='$name'> <br>";
        
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
        
        echo "Price: <input type='text' name='price_field' value='$price'><br>";
        echo "Stock: <input type='text' name='stock_field' value='$stock'><br>";        
        echo "Location <input type='text' name='location_field' value='$loca'><br>";
        echo "Part_type: <input type='text' name='part_type_field' value='$type' readonly><br>";
        
        if ($type == CPU) {
            $sql = "SELECT * FROM cpu WHERE part_id = $part_id ";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            $clock = $row['clock_speed'];
            $cores = $row['cores'];
            $threads = $row['threads'];
            echo "Clockspeed: <input type='text' name='cpu_clockspeed_field' value='$clock'><br>";
            echo "Cores: <input type='text' name='cores_field' value='$cores'><br>";
            echo "Threads: <input type='text' name='threads_field' value='$threads'><br>";   
        } else if ($type == GPU) {
            $sql = "SELECT * FROM gpu WHERE part_id = $part_id ";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            $vram = $row['vram'];
            $clock = $row['clock_speed'];
            echo "Cores: <input type='text' name='vram_field' value='$vram'><br>";
            echo "Clockspeed: <input type='text' name='gpu_clockspeed_field' value='$clock'><br>";
        } else if ($type == PSU) {
            $sql = "SELECT * FROM psu WHERE part_id = $part_id ";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            $watt = $row['wattage'];
            $mod = $row['modularity'];
            $rate = $row['rating'];
            echo "Wattage: <input type='text' name='wattage_field' value='$watt'><br>";
            echo "Modularity: <input type='text' name='modularity_field' value='$mod'><br>";
            echo "Rating: <input type='text' name='rating_field' value='$rate'><br>";   
        } else if ($type == HDD) {
            $sql = "SELECT * FROM hdd WHERE part_id = $part_id ";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            $cap = $row['capacity'];
            $rpm = $row['rpm'];
            echo "Capacity: <input type='text' name='capacity_field' value='$cap'><br>";
            echo "RPM: <input type='text' name='rpm_field' value='$rpm'><br>";
        } else if ($type == RAM) {
            $sql = "SELECT * FROM ram WHERE part_id = $part_id ";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            $size = $row['size'];
            $speed = $row['speed'];
            $arch = $row['architecture'];
            echo "Size: <input type='text' name='size_field' value='$size'><br>";
            echo "Speed: <input type='text' name='speed_field' value='$speed'><br>";
            echo "Architecture: <input type='text' name='architecture_field' value='$arch'><br>"; 
        }
        
        echo "<br><input type='submit' value='Modify'>";
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

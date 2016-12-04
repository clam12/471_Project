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
        
        $part_id = $_POST['part_id_field'];
        $name = $_POST['part_name_field'];
        $manu = $_POST['manufacturer'];
        $price = $_POST['price_field'];
        $stock = $_POST['stock_field'];
        $loca = $_POST['location_field'];
        $type = $_POST['part_type_field'];
        
        if (strlen($name) == 0 || strlen($price) == 0 || strlen($stock) == 0 || strlen($loca) == 0 ) {
            echo "Error: One or more of the required fields are empty <br>";
        } else {          
            $sql = "UPDATE part SET part_name = '$name', company_name = '$manu', price = '$price', stock = '$stock', location = '$loca' WHERE part_id = $part_id";

            if ($conn->query($sql) === TRUE) {
                echo "Part updated successfully <br>";
                if ($type == CPU) {
                   $clock = $_POST['cpu_clockspeed_field'];
                   $cores = $_POST['cores_field'];
                   $threads = $_POST['threads_field'];
                   $sql = "UPDATE cpu SET clock_speed = '$clock', cores = '$cores', threads = '$threads' WHERE part_id = $part_id";
                   if ($conn->query($sql) === TRUE) {
                        echo "CPU updated successfully <br>";
                   } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                   }      
                } else if ($type == GPU) {
                    $vram = $_POST['vram_field'];
                    $clock = $_POST['gpu_clockspeed_field'];
                    $sql = "UPDATE gpu SET vram = '$vram', clock_speed = '$clock' WHERE part_id = $part_id";
                    if ($conn->query($sql) === TRUE) {
                        echo "GPU updated successfully <br>";
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    } 
                } else if ($type == PSU) {
                    $wattage = $_POST['wattage_field'];
                    $modularity = $_POST['modularity_field'];
                    $rating = $_POST['rating_field'];
                    $sql = "UPDATE psu SET wattage = '$wattage', modularity = '$modularity', rating = '$rating' WHERE part_id = $part_id";
                    if ($conn->query($sql) === TRUE) {
                        echo "PSU updated successfully <br>";
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }                   
                } else if ($type == HDD) {
                    $capacity = $_POST['capacity_field'];
                    $rpm = $_POST['rpm_field'];
                    $sql = "UPDATE hdd SET capacity = '$capacity', rpm = '$rpm' WHERE part_id = $part_id";
                    if ($conn->query($sql) === TRUE) {
                        echo "HDD updated successfully <br>";
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }                   
                } else if ($type == RAM) {
                    $size = $_POST['size_field'];
                    $speed = $_POST['speed_field'];
                    $arch = $_POST['architecture_field'];
                    $sql = "UPDATE ram SET size = '$size', speed = '$speed', architecture = '$arch' WHERE part_id = $part_id";
                    if ($conn->query($sql) === TRUE) {
                        echo "RAM updated successfully <br>";
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }                 
                } else {
                  //other, do nothing.
                }
            }

        $conn->close();
        }
        
        echo "<br> Redirecting you back to the inventory page after 5 seconds.";
        //header('Refresh: 5; url=inventory.php');
        //echo "<meta http-equiv='Refresh' content='5; inventory.php'>"; 
        ?>

        <br> <a href="inventory.php">Back to Inventory</a> <br>
    </body>
</html>

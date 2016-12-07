<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Submit Insert Part</title>
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
        $type = $_POST['part_type'];
        
        if (strlen($name) == 0 || strlen($price) == 0 || strlen($stock) == 0 || strlen($loca) == 0 || strlen($type) == 0 ) {
            echo "Error: One or more of the required fields are empty";
        } else {          
            $sql = "INSERT INTO part (part_name, company_name, price, stock, location, part_type) VALUES ('$name','$manu','$price','$stock','$loca','$type')";

            if ($conn->query($sql) === TRUE) {
                echo "New part created successfully <br>";
                if (!empty($type)) {
                $sql = "SELECT part_id FROM part WHERE part_name = '$name' AND company_name = '$manu' AND price = '$price' AND stock = '$stock' AND location = '$loca' AND part_type = '$type'";
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();
                $part_id = $row['part_id'];

                if ($type == CPU) {
                   $clock = $_POST['cpu_clockspeed'];
                   $cores = $_POST['cores'];
                   $threads = $_POST['threads'];
                   $sql = "INSERT INTO `cpu` VALUES ('$part_id', '$clock', '$cores', '$threads')";
                   if ($conn->query($sql) === TRUE) {
                        echo "New CPU created successfully <br>";
                   } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                   }      
                } else if ($type == GPU) {
                    $vram = $_POST['vram'];
                    $clock = $_POST['gpu_clockspeed'];
                    $sql = "INSERT INTO `gpu` VALUES ('$part_id', '$vram', '$clock')";
                    if ($conn->query($sql) === TRUE) {
                        echo "New GPU created successfully <br>";
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    } 
                } else if ($type == PSU) {
                    $wattage = $_POST['wattage'];
                    $modularity = $_POST['modularity'];
                    $rating = $_POST['rating'];
                    $sql = "INSERT INTO `psu` VALUES ('$part_id', '$wattage', '$modularity', '$rating')";
                    if ($conn->query($sql) === TRUE) {
                        echo "New PSU created successfully <br>";
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }                   
                } else if ($type == HDD) {
                    $capacity = $_POST['capacity'];
                    $rpm = $_POST['rpm'];
                    $sql = "INSERT INTO `hdd` VALUES ('$part_id', '$capacity', '$rpm')";
                    if ($conn->query($sql) === TRUE) {
                        echo "New HDD created successfully <br>";
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }                   
                } else if ($type == RAM) {
                    $size = $_POST['size'];
                    $speed = $_POST['speed'];
                    $arch = $_POST['architecture'];
                    $sql = "INSERT INTO `ram` VALUES ('$part_id', '$size', '$speed', '$arch')";
                    if ($conn->query($sql) === TRUE) {
                        echo "New RAM created successfully <br>";
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }                 
                } else {
                  //other, do nothing.
                }
                
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }

        $conn->close();
        }
        
        echo "<br> Redirecting you back to the inventory page after 5 seconds.";
        //header('Refresh: 5; url=inventory.php');
        echo "<meta http-equiv='Refresh' content='5; inventory.php'>"; 
        ?>

        <br> <a href="inventory.php">Back to Inventory</a> <br>
    </body>
</html>

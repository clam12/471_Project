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
        
        $name = $_POST['name'];
        $manu = $_POST['manufacturer'];
        $price = $_POST['price'];
        $stock = $_POST['stock'];
        $loca = $_POST['location'];
        $type = $_POST['part_type'];
        

        echo $type;
        
        if (empty($name) || empty($price) || empty($stock) || empty($loca)) {
            echo "Error: One or more of the required fields are empty";
        } else {          
            $sql = "INSERT INTO part (part_name, company_name, price, stock, location) VALUES ('$name','$manu','$price','$stock','$loca')";

            if ($conn->query($sql) === TRUE) {
                echo "New part created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
        
        
        if (!empty($type)) {
            $sql = "SELECT part_id FROM part WHERE part_name = '$name' AND company_name = '$manu' AND price = '$price' AND stock = '$stock' AND location = '$loca'";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            $part_id = $row['part_id'];
            
            if ($type == CPU) {
               $clock = $_POST['cpu_clockspeed'];
               $cores = $_POST['cores'];
               $threads = $_POST['threads'];
               $sql = "INSERT INTO `cpu` VALUES ('$part_id', '$clock', '$cores', '$threads')";
               if ($conn->query($sql) === TRUE) {
                    echo "New CPU created successfully";
               } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
               }      
            } else if ($type = GPU) {
                $vram = $_POST['vram'];
                $clock = $_POST['gpu_clockspeed'];
                $sql = "INSERT INTO `gpu` VALUES ('$part_id', '$vram')";
               
            } else if ($type = PSU) {
                
            } else if ($type = HDD) {
                
            } else if ($type = RAM) {
                
            } else {
                
            }
        $conn->close();
        }
        ?>
        
        <br> <a href="inventory.php">Back</a> <br>
    </body>
</html>

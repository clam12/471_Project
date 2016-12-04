<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Insert Part</title>
        <style>
            .reveal-if-active {
                opacity: 0;
                max-height: 0;
                overflow: hidden;
                font-size: 16px;
                transform: scale(0.8);
                transition: 0.5s;
            }

            input[type="radio"]:checked ~.reveal-if-active {
                opacity: 1;
                max-height: 100px;
                padding: 10px 20px;
                transform: scale(1);
                overflow: visible;
            }
        
        </style>
    </head>
    <h1>Insert New Part</h1>   
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
        
        echo "<form action='inventory_insert_complete.php' method='post'>";
        echo "Name: <input type='text' name='name'><br>";
        
        $sql = "SELECT company_name FROM manufacturer ";
        $result = $conn->query($sql);
        echo "Manufacturer: <select name='manufacturer'>";
        
        while ($row = $result->fetch_assoc()) {
            $name = $row['company_name'];
            echo "<option value= '$name' >" .$name. "</option>";
        }
        
        echo "</select><br>";
        echo "Price: <input type ='text' name='price'><br>";
        echo "Stock: <input type ='text' name='stock'><br>";
        echo "Location: <input type ='text' name='location'><br>";
        
        echo "<div>";
            echo "<input type='radio' name='part_type' id='CPU' value='CPU'>";
            echo "<label for='CPU'>CPU</label>";
            echo "<div class='reveal-if-active'>";
                echo "Clockspeed: <input type='text' id='cpu_clockspeed' name='cpu_clockspeed'>  <br>";
                echo "Cores: <input type='text' id='cores' name='cores'>  <br>";
                echo "Threads:  <input type='text' id='threads' name='threads'> <br>";
            echo "</div>";
        echo "</div>";
        
        echo "<div>";
            echo "<input type='radio' name='part_type' id='GPU' value='GPU'>";
            echo "<label for='GPU'>GPU</label>";

            echo "<div class='reveal-if-active'>";
                echo "VRAM: <input type='text' id='vram' name='vram'> <br>";
                echo "Clockspeed: <input type='text' id='gpu_clockspeed' name='gpu_clockspeed'> <br>";
            echo "</div>";
        echo "</div>";
        
        echo "<div>";
            echo "<input type='radio' name='part_type' id='PSU' value='PSU'>";
            echo "<label for='PSU'>PSU</label>";

            echo "<div class='reveal-if-active'>";
                echo "Wattage: <input type='text' id='wattage' name='wattage'>  <br>";
                echo "Modularity: <input type='text' id='modularity' name='modularity'>  <br>";
                echo "Rating:  <input type='text' id='rating' name='rating'> <br>";
            echo "</div>";
        echo "</div>";
        
        echo "<div>";
            echo "<input type='radio' name='part_type' id='HDD' value='HDD'>";
            echo "<label for='HDD'>HDD</label>";

            echo "<div class='reveal-if-active'>";
                echo "Capactiy: <input type='text' id='capacity' name='capacity'>  <br>";
                echo "RPM: <input type='text' id='rpm' name='rpm'>  <br>";
            echo "</div>";
        echo "</div>";
        
        echo "<div>";
            echo "<input type='radio' name='part_type' id='RAM' value='RAM'>";
            echo "<label for='RAM'>RAM</label>";

            echo "<div class='reveal-if-active'>";
                echo "Size: <input type='text' id='wattage' name='size'>  <br>";
                echo "Speed: <input type='text' id='modularity' name='speed'>  <br>";
                echo "Architecture: <input type='text' id='rating' name='architecture'> <br>";
            echo "</div>";
        echo "</div>";
        
        echo "<div>";
            echo "<input type='radio' name='part_type' id='other' value='other'>";
            echo "<label for='other'>Other</label>";
        echo "</div>";
        
        echo "<br><input type='submit' value='Insert'>";
        echo "</form>";
       
        $conn->close();
        
        ?>
 
        <br> <a href="inventory.php">Back</a> <br>
    </body>
</html>


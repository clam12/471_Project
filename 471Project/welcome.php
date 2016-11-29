<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Inventory System</title>
    </head>
    <body>
        Logged in bois <br>
        <?php
        $servername="localhost";
        $username="root";
        $password="password";
        
        $conn = new mysqli($servername, $username, $password);
        
        if ($conn ->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        echo "Connected successfully";
        
        
        ?>
        <br>
        <a href="index.php">Log out bois </a>
        
    </body>
</html>

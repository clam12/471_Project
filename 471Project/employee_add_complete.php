<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="Refresh" content="2; employee.php"> 
        <title>Employee Added</title>
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
        
        $name = $_POST["employee_name"];
        $phone_number = $_POST["phone_number"];
        
        if(empty($name) || empty(phone_number)){
            echo "Error: One or more of the required fields are empty";
        }else if(strlen($phone_number) != 10){
            echo "Error: Invalid phone number";
        }else{
            $sql = "INSERT INTO `employee` (name, phone_number) VALUES('$name', $phone_number)";
            
            if($conn->query($sql) == TRUE){
                echo "Employee Added";
            }
            //echo gettype($conn->query($sql)) == FALSE;
        }
        ?>
        <br>
        <a href = "employee_add.php">Back</a>
    </body>
</html>

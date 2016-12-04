<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Add Employee</title>
    </head>
    <h1>Add Employee</h1>
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

        echo "<form action='employee_add_complete.php' method='post'>";
        echo "Name: <input type='text' name='employee_name'><br>";
        echo "Phone Number: <input type = 'text' name = 'phone_number'><br>";
        echo "<input type = 'submit' value = 'Add'>";
        echo "</form>";
        ?>
        <a href = "employee.php">Back</a>
    </body>
</html>
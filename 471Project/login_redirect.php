<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Logging in</title>
    </head>
    <body>
        <?php
        session_start();
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

        $name = $_POST["name"];
        $password = $_POST["password"];
        $_SESSION['employee_name'] = $name;
        $_SESSION['phone_number'] = $password;
        $sql = "SELECT name, phone_number FROM `employee` WHERE name = '$name' AND phone_number = '$password'";
        $result = $conn -> query($sql);
        $row = $result -> fetch_assoc();
        if($row > 0){
            echo "Login successful: Redirecting...";
            echo "<meta http-equiv=\"Refresh\" content=\"2; welcome.php\">";
        }else{
            echo "Login error: Redirecting...";
            echo "<meta http-equiv=\"Refresh\" content=\"2; index.php\">";
        }
        ?>
    </body>
</html>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="Refresh" content="2; manufacturer.php"> 
        <title>Manufacturer Added</title>
    </head>
    <body>
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "password";
        $dbname = "inventory";

        $company_name = $_POST["company_name"];
        $contact_name = $_POST["contact_name"];
        $phone_number = $_POST["phone_number"];

        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        if (empty($company_name) || empty($contact_name) || empty($phone_number)) {
            echo "Error: One or more of the required fields are empty. Redirecting...";
        } else if (strlen($phone_number) != 10) {
            echo "Error: Invalid phone number";
        } else {
            $sql = "INSERT INTO `manufacturer` (company_name, contact_name, phone_number) VALUES('$company_name', '$contact_name', $phone_number)";

            if ($conn->query($sql) == TRUE) {
                echo "Manufacturer Added";
            }
        }
        ?>
    </body>
</html>

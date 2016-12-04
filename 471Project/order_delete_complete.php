<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Order Deleted</title>
    </head>
    <h1>Order Removed</h1>
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
        
        $order_id = $_POST['order_id'];
        
        if (empty($order_id)) {
            echo "Error: order ID is empty";
        } else {
            $sql = "DELETE FROM `order` WHERE order_id = '$order_id'";
            $conn->query($sql); 
        }
        
        $conn->close();
        ?>
        
        <br> <a href="orders.php">Return to Orders</a><br>
    </body>
</html>

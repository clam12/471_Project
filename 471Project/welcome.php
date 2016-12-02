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
    <h1> Logged in as: <?php session_start(); echo $_SESSION["employee_name"]; ?></h1>
    <body>
        <?php
        ?>
        <a href="inventory.php">Inventory</a> <br>
        <a href="orders.php">Orders</a> <br>
        <a href="employee.php">Employee</a><br>
        <a href="index.php">Log out</a> <br>
        
    </body>
</html>

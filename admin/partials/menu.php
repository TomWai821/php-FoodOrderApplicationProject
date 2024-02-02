<?php 
include('../config/constants.php');
include('login-check.php');
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Food Order Website - Home Page</title>
        <link rel="stylesheet" href="../css/style.css"/>
        <link rel="stylesheet" href="../css/admin.css"/>
    </head>

    <body>
        <!--Menu-->
        <section id="menu">
            <ul>
                <a href="../pages/index.php"><li>Home</li></a>
                <a href="../pages/manage-admin.php"><li>Admin</li></a>
                <a href="../pages/manage-category.php"><li>Category</li></a>
                <a href="../pages/manage-food.php"><li>Food</li></a>
                <a href="../pages/manage-order.php"><li>Order</li></a>
                <a href="../api/logout.php"><li>Logout</li></a>
            </ul>
        </section>
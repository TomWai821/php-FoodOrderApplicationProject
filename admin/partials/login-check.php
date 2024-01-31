<?php
    //Authorization - Access Control
    //Check weather the user is logged in or not
    if(!isset($_SESSION['user'])){
        echo "
        <script>
            alert('Please login to access Admin Panel!');
            window.location = 'login.php';
        </script>";
    }
?>
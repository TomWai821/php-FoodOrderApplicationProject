<?php
    include('../config/constants.php');

    // Destory the Session
    session_destroy();

    echo "
    <script>
        alert('Logout Successfully!');
        window.location = '../pages/login.php'
    </script>";
   
?>
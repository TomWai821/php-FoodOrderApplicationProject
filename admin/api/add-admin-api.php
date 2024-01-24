<?php
    include('../config/constants.php');

    if(isset($_POST['submit']))
    {
        // Get data from input field
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Insert input field value to database with sql query
        $sql_cmd = "INSERT INTO tbl_admin SET full_name ='$full_name', username= '$username', password = '$password'";

        // Execute the sql query to table
        $res = mysqli_query($con, $sql_cmd) or die(mysqli_error()); 

        if($res == TRUE && $full_name != null && $username != null && $password != null) // Data inserted
        {
            // Display alert to show add admin successfully
            echo "
            <script>
                alert('Add Admin Successfully');
                window.location = '../pages/manage-admin.php';
            </script>";
        }
        else // Failed to insert data
        {
            // Display alert to show failed to add admin
            echo 
            "<script>
                alert('Failed to Add Admin');
                window.location = '../pages/add-admin.php';
            </script>";
        }       
    }
?>
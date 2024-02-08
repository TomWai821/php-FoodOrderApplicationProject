<?php
    include("../config/constants.php");

    // Get the ID of Admin to be deleted
    $id = $_GET['id'];

    // Create SQL Query to Delete Admin
    $sql_cmd = "DELETE FROM tbl_admin WHERE id = $id";

    // Execute to delete query
    $res = mysqli_query($con, $sql_cmd);

    if($res == TRUE)
    {
        echo "
        <script>
            alert('Delete Admin Successfully');
            window.location = '../pages/manage-admin.php';
        </script>";
    }
    else
    {
        echo "
        <script>
            alert('Failed to Delete Admin);
            window.location = '../pages/manage-admin.php';
        </script>";
    }
?>
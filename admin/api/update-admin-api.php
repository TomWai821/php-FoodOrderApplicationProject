<?php
    include("../config/constants.php");

    if(isset($_POST['submit']))
    {
        // Get data from input field
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];

        // Update SQL Query(Update username)
        $sql_cmd = "UPDATE tbl_admin SET username = '$username' WHERE full_name = '$full_name'";

        // Execute the query
        $res = mysqli_query($con, $sql_cmd) or die(mysqli_error());

        // Check query is executed or not
        if($res == TRUE && $full_name != null and $username != null)
        {
            // alert to show update succesfully and redirect to manage admin page
            echo "
            <script>
                alert('Update username Successfully!');
                window.location = '../pages/manage-admin.php';
            </script>
            ";
        }else
        {
            // alert to show update succesfully and redirect to update-admin page
            echo "
            <script>
                alert('Failed to Update username!');
                window.location = '../pages/update-admin.php';
            </script>
            ";
        }
    }
?>
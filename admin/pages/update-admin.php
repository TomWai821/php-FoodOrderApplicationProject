<?php include('../partials/menu.php');?>

    <!--Main Contect-->
    <section id="main-content">
        <h1 id="title">Update Admin</h1>

        <form action="" method="POST" encrypt="multipart/form-data">
            <table>
                <tr>
                    <td>Full Name:</td>
                    <td><input type="text" name="full_name" placeholder="Your Full Name"></input></td>
                </tr>

                <tr>
                    <td>Username:</td>
                    <td><input type="text" name="username" placeholder="New Username"></input></td>
                </tr>

                <tr>
                    <td>
                        <input type="hidden" name="id" value="<?php echo "$id";?>"/>
                        <input type="submit" name="submit" value="Update Admin" id="btn-secondary"/>
                    </td>
                </tr>
            </table>
        </form>
    </section>

<?php include('../partials/footer.php');?>

<?php

    if(isset($_POST['submit']))
    {
        // Get data on hidden input field
        $id = $_GET['id'];
        
        // Get data from full name input field
        $full_name = mysqli_real_escape_string($con, $_POST['full_name']);

        // Get data from full name username field
        $username = mysqli_real_escape_string($con, $_POST['username']);

        if($full_name != null & $username != null)
        {
            // Update SQL Query(Update username)
            $sql_cmd = "UPDATE tbl_admin SET username = '$username', full_name = '$full_name' WHERE id = $id";

            // Execute the query
            $res = mysqli_query($con, $sql_cmd) or die(mysqli_error());
        }

        // Check query is executed or not
        if($res == TRUE)
        {
            // alert to show update succesfully and redirect to manage admin page
            echo "
            <script>
                alert('Update username Successfully!');
                window.location = 'manage-admin.php';
            </script>
            ";
        }
        else
        {
            // alert to show update succesfully and redirect to update-admin page
            echo "
            <script>
                alert('Failed to Update username!');
                window.location = 'update-admin.php';
            </script>
            ";
        }
    }
?>


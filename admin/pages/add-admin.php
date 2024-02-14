
<?php include('../partials/menu.php'); ?>

    <section id="main-content">
        <h1 id="title">Add Admin</h1>

        <form action="" method="POST" enctypt="multipart/form-data">
            <table>
                <tr>
                    <td>Full Name:</td>
                    <td><input type="text" name="full_name"  placeholder="Enter Your Name"></td>
                </tr>

                <tr>
                    <td>Username:</td>
                    <td><input type="text" name="username"  placeholder="Your Username"></td>
                </tr>

                <tr>
                    <td>Password:</td>
                    <td><input type="text" name="password" placeholder="Your Password"></td>
                </tr>

                <tr>
                    <td>
                        <input type="submit" name="submit" value="Add Admin" id="btn-add"/>
                    </td>
                </tr>
            </table>
        </form>
    </section>

<?php include('../partials/footer.php');?>

<?php
    if(isset($_POST['submit']))
    {
        // Get data from input field
        $full_name = mysqli_real_escape_string($con, $_POST['full_name']);
        $username = mysqli_real_escape_string($con, $_POST['username']);
        
        $raw_password = md5($_POST['password']);
        $password = mysqli_real_escape_string($con, $raw_password);

        if($full_name != null && $username != null && $password != null){
            // Insert input field value to database with sql query
            $sql_cmd = "INSERT INTO tbl_admin SET full_name ='$full_name', username= '$username', password = '$password'";

            // Execute the sql query to table
            $res = mysqli_query($con, $sql_cmd) or die(mysqli_error());
        } 

        if($res == TRUE) // Data inserted
        {
            // Display alert to show add admin successfully
            echo "
            <script>
                alert('Add Admin Successfully');
                window.location = 'manage-admin.php';
            </script>";
        }
        else // Failed to insert data
        {
            // Display alert to show failed to add admin
            echo 
            "<script> alert('Failed to Add Admin'); </script>";
        }       
    }
?>
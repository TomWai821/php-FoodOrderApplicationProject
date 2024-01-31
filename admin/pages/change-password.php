<?php include('../partials/menu.php')?>

<!--Main Content-->
<section id="main-content">
    <h1 id="title">Change Password</h1>

    <form action="" method="POST" encrypt="multipart/form-data">
        <table>
            <tr>
                <td>Current Password:</td>
                <td><input type="text" name="current_password" placeholder="Current Password"></input></td>
            </tr>   

            <tr>
                <td>New Password:</td>
                <td><input type="text" name="new_password" placeholder="New Password"></input></td>
            </tr>

            <tr>
                <td>Confirm Password:</td>
                <td><input type="text" name="confirm_password" placeholder="Confirm Password"></input></td>
            </tr>

            <tr>
                <td>
                    <input type="hidden" name="id" value="<?php echo "$id";?>"/>
                    <input type="submit" name="submit" value="Change Password" id="btn-primary"/>
                </td>
            </tr>
        </table>
    </form>
</section>

<?php include('../partials/footer.php')?>

<?php

    if(isset($_POST['submit']))
    {

        $id = $_GET['id'];
        $current_password  = $_POST['current_password'];
        $new_password = $_POST['new_password'];
        $confirm_password = $_POST['confirm_password'];

        if($new_password == $confirm_password && $current_password != null){
            $sql_cmd = "UPDATE tbl_admin SET password = '$new_password' WHERE password = '$current_password' AND id = $id";
            $res = mysqli_query($con, $sql_cmd) or die(mysqli_error());
        }

        if($res == TRUE)
        {
            echo "
            <script>
                alert('Password Update Successfully!');
                window.location = 'manage-admin.php';
            </script>";
            
        }
        else
        {
            echo "
            <script>
                alert('User not found!');
                window.location = 'manage-admin.php';
            </script>";
        }
        
        

    }    
?>
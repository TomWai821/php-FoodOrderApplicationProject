<?php include('../partials/menu.php');?>

<!--Main Contect-->
<section id="main-content">
    <h1 id="title">Manage Admin</h1>

    <a href="add-admin.php" id="btn-add">Add Admin</a>

    <form action='' method='post' encrypt='multipart/form-data'>
        <table id='fliter'>
            <tr>

                <td>
                    <span id='fliter-title'>Full Name:</span>
                    <input type='text' name='fliter-fullname' id='fliter-inputfield' placeholder='Input Full Name'>
                </td>

                <td>
                    <span id='fliter-title'>Username:</span>
                    <input type='text' name='fliter-username' id='fliter-inputfield' placeholder='Input Username'>
                </td>

                <td>
                    <input type='submit' name='fliter-submit' id='btn-primary' value='Search'>
                </td>
            </tr>
        </table>
    </form>

    <table id="tables">
        <tr>
            <th>S.N.</th>
            <th>Full Name</th>
            <th>Username</th>
            <th>Actions</th>
        </tr>

        <?php
            // Query to get all admin
            $sql_query = "SELECT * FROM tbl_admin";

            // When user click search button
            if(isset($_POST['fliter-submit']))
            {
                $fliter_fullname = mysqli_real_escape_string($con, $_POST['fliter-fullname']);
                $fliter_username = mysqli_real_escape_string($con, $_POST['fliter-username']);

                if($fliter_fullname != "" || $fliter_username != "")
                {
                    // WHERE Query Only appear on fullname have input/username have input
                    $sql_query .= " WHERE";

                    // Query for fullname input
                    if($fliter_fullname != "")
                    {
                        $sql_query .= " `full_name` LIKE '%$fliter_fullname%'";
                    }

                    // Query for username input 
                    if($fliter_username != "")
                    {
                        if($fliter_fullname != "")
                        {
                            // While fullname have input
                            $sql_query .= " AND";
                        }
                        
                        // Only  username have input
                        $sql_query .= " `username` = '%$fliter_username%'";
                    }
                        
                }
            }

            // Execute the Query
            $res = mysqli_query($con,$sql_query);

            // Set num variable to count rows amount
            $num = 1;

            if($res == TRUE)
            {
                // Count Rows to check wether we have data in database or not
                $rows = mysqli_num_rows($res); // Function to get all the rows in database

                //Check the num of rows
                if($rows > 0)
                {
                    // We have data in database
                    while($rows = mysqli_fetch_assoc($res)) //Using while loop to get all the data from database
                    {
                        $id = $rows['id'];
                        $full_name = $rows['full_name'];
                        $username = $rows['username'];
                        ?>
                        <!--Display the data in table-->
                        <tr>
                            <td><?php echo $num++;?></td>
                            <td><?php echo $full_name;?></td>
                            <td><?php echo $username;?></td>
                            <td>
                                <a href="change-password.php?id=<?php echo $id;?>" id="btn-primary">Change Password</a>
                                <a href="update-admin.php?id=<?php echo $id;?>" id="btn-secondary">Update Admin</a>
                                <a href="../api/delete-admin-api.php?id=<?php echo $id;?>" id="btn-danger">Delete Admin</a>
                            </td>
                        </tr>
                        <?php
                    }
                }
                else
                {
                    ?>
                    <!--Display Something while there are nothing in database-->
                    <tr>
                        There are no data in database
                            <td>N/A</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                    </tr>
                    <?php
                }
            }
        ?>
        
    </table>
</section>

<?php include('../partials/footer.php')?>
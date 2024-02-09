<?php include('../partials/menu.php');?>

<!--Main Contect-->
<section id="main-content">
    <h1 id="title">Manage Admin</h1>

    <a href="add-admin.php" id="btn-add">Add Admin</a>

    <table id="tables">
        <tr>
            <th>S.N.</th>
            <th>Full Name</th>
            <th>Username</th>
            <th>Actions</th>
        </tr>

        <?php
            // Query to get all admin
            $sql_cmd = "SELECT * FROM tbl_admin";
            // Execute the Query
            $res = mysqli_query($con,$sql_cmd);
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
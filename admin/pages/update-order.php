<?php include('../partials/menu.php') ?>

<?php
    if(isset($_GET['id']))
    {
        // Get id
        $id = $_GET['id'];

        // Query to Get data (base on id)
        $get_query = "SELECT * FROM tbl_order WHERE id = $id";

        // Send query to database
        $get_res = mysqli_query($con, $get_query);

        if($get_res == true)
        {
            // count rows in database
            $count = mysqli_num_rows($get_res);

            if($count > 0)
            {
                while($count = mysqli_fetch_assoc($get_res))
                {
                    // Cannot change in update panel
                    $food = $count['food'];
                    $qty = $count['qty'];
                    $price = $count['price'];
                    $date = $count['order_date'];

                    // Can change in update panel
                    $current_status = $count['stat'];
                    $current_name = $count['customer_name'];
                    $current_contact = $count['customer_contact'];
                    $current_email = $count['customer_email'];
                    $current_address = $count['customer_address'];
                }
            }
            else
            {
                // Redirect to manage-order page
                header('manage-order.php');
            }
        }
    }
?>

<section id="main-content">
    <h1 id="title">Update Order</h1>
    <form action="" method="post" encrypt="multipart/form-data">
        <table>
            <tr>
                <td>Food:</td>
                <td><?php echo $food ;?></td>
            </tr>

            <tr>
                <td>Quantity:</td>
                <td><?php echo $qty ;?></td>
            </tr>

            <tr>
                <td>Price:</td>
                <td><?php echo $price ;?></td>
            </tr>

            <tr>
                <td>Order Date:</td>
                <td><?php echo $date ;?></td>
            </tr>

            <tr>
                <td>Status:</td>
                <td>
                    <select name="stat">
                        <option value="Ordered" <?php if($current_status == "Ordered") { echo "selected ='selected' ";}?>>Ordered</option>
                        <option value="Delivery" <?php if($current_status == "Delivery") { echo "selected ='selected' ";}?>>On Delivery</option>
                        <option value="Delivered" <?php if($current_status == "Delivered") { echo "selected ='selected' ";}?>>Delivered</option>
                        <option value="Cancelled" <?php if($current_status == "Cancelled") { echo "selected ='selected' ";}?>>Cancelled</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td>Customer Name:</td>
                <td><input type="text" name="name" value="<?php echo $current_name;?>"></td>
            </tr>

            <tr>
                <td>Customer Contact:</td>
                <td><input type="text" name="contact" value="<?php echo $current_contact;?>"></td>
            </tr>

            <tr>
                <td>Customer Email:</td>
                <td><input type="email" name="email" value="<?php echo $current_email;?>"></td>
            </tr>

            <tr>
                <td>Customer Address:</td>
                <td><textarea rows="5" name="address"><?php echo $current_address;?></textarea></td>
            </tr>

            <tr>
                <td>
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <input type="submit" name="submit" id="btn-secondary" value="Update Order">
                </td>
            </tr>
        </table>
    </form>
</section>

<?php include('../partials/footer.php') ?>

<?php
    if(isset($_POST['submit']))
    {
        $stat = $_POST['stat'];
        $name = $_POST['name'];
        $contact = $_POST['contact'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        
        $sql_query = "UPDATE tbl_order SET 
            stat = '$stat', 
            customer_name = '$name', 
            customer_contact = '$contact',
            customer_email = '$email',
            customer_address = '$address' 
            WHERE id = $id";

        $res = mysqli_query($con, $sql_query);

        if($res == true)
        {
            echo "
            <script>
                alert('Update Order Successfully!');
                window.location = 'manage-order.php';
            </script>";
        }
        else
        {
            echo "
            <script>
                alert('Failed to Update Order!');
                window.location = 'manage-order.php';
            </script>";
        }
    }
?>
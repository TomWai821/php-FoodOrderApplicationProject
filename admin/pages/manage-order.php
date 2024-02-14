<?php include('../partials/menu.php');?>

<!--Main Contect-->
<section id="main-content">
    <h1 id="title">Manage Order</h1>
    <form action="" method="post" encrypt="multipost/form-data">
        <table id="fliter">
            <tr>
                <td>
                    <span id="fliter-title">Food:</span>
                    <input type="text" name="fliter-food" id="fliter-inputfield" placeholder="Input Food">
                </td>

                <td>
                    <span id="fliter-title">Total:</span>
                    <select name="fliter-total" id="fliter-select">
                        <option value="">-</option>
                        <option value="Low">$0-$19</option>
                        <option value="Medium">$20 - $50</option>
                        <option value="High">$50+</option>
                        </select>
                </td>

                <td>
                    <span id="fliter-title">Status:</span>
                    <select name="fliter-stat" id="fliter-select">
                        <option value="">-</option>
                        <option value="Ordered">Ordered</option>
                        <option value="Delivery">On Delivery</option>
                        <option value="Delivered">Delivered</option>
                        <option value="Cancelled">Cancelled</option>
                    </select>
                </td>
                <td>
                    <input type="submit" name="fliter-submit" id="btn-primary" value="Search">
                </td>
            </tr>
        </table>
    </form>
        <table id='tables'>
            <tr>
                <th>S.N.</th>
                <th>Food</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
                <th>Status</th>
                <th>Customer Name</th>
                <th>Customer Contact</th>
                <th>Customer Email</th>
                <th>Customer Address</th>
                <th>Actions</th>
            </tr>

            <?php

                $get_query = "SELECT * FROM tbl_order";

                if(isset($_POST['fliter-submit']))
                {
                    // Get data from fliter-food input field
                    $fliter_food = mysqli_real_escape_string($con, $_POST['fliter-food']);

                    // Get data from fliter-total' input field
                    $fliter_total = $_POST['fliter-total'];

                    // Get data from fliter-stat input field
                    $fliter_stat = $_POST['fliter-stat'];

                    // Insert String to Query while any inputfield not null
                    if($fliter_food != "" || $fliter_total != "" || $fliter_stat != "")
                    {
                        $get_query .= " WHERE";

                        // Insert String to Query while fliter_food not null
                        if($fliter_food != "")
                        {
                            $get_query .= " food LIKE '%$fliter_food%'";
                        }

                        // Insert String to Query while fliter_total not null
                        if($fliter_total != "")
                        {
                            if($fliter_food != "")
                            {
                                $get_query .= " AND";
                            }

                            switch($fliter_total)
                            {
                                case "Low":
                                    $get_query .= " total BETWEEN 0 AND 19";
                                    break;

                                case "Medium":
                                    $get_query .= " total BETWEEN 20 AND 50";
                                    break;

                                case "High":
                                    $get_query .= " total > 50 ";
                                    break;
                            }
                        }

                        // Insert String to Query while fliter_stat not null
                        if($fliter_stat != "")
                        {
                            if($fliter_food != "" || $fliter_total != "")
                            {
                                $get_query .= " AND";
                            }

                            $get_query .= " stat = '$fliter_stat'";
                        }
                    }
                }

                // Send select query to database
                $get_res = mysqli_query($con, $get_query);

                if($get_res == true)
                {
                    $count = mysqli_num_rows($get_res);
                    $num = 1;

                    if($count > 0)
                    {
                        // Count and get the data while fetch the data on tbl_order
                        while($count = mysqli_fetch_assoc($get_res))
                        {
                            $id = $count['id'];
                            $food = $count['food'];
                            $price = $count['price'];
                            $qty = $count['qty'];
                            $total = $count['total'];
                            $stat = $count['stat'];
                            $name = $count['customer_name'];
                            $contact = $count['customer_contact'];
                            $email = $count['customer_email'];
                            $address = $count['customer_address'];
                            ?>
                            <tr>
                                <td><?php echo $num++;?></td>
                                <td><?php echo $food;?></td>
                                <td>$<?php echo $price;?></td>
                                <td><?php echo $qty;?></td>
                                <td>$<?php echo $total?></td>
                                <td>
                                <?php 
                                    switch($stat)
                                    {
                                        // Print while stat change to Ordered
                                        case "Ordered":
                                            echo "<span>Ordered</span>";
                                            break;

                                        // Print while stat change to On Delivery
                                        case "Delivery":
                                            echo "<span style='color: #FFC000;'>On Delivery</span>";
                                            break;

                                        // Print while stat change to Delivered
                                        case "Delivered":
                                            echo "<span style='color: green;'>Delivered</span>";
                                            break;

                                        // Print while stat change to Cancelled
                                        case "Cancelled":
                                            echo "<span style='color: red;'>Cancelled</span>";
                                            break;
                                    }
                                ?>
                                </td>
                                <td><?php echo $name;?></td>
                                <td><?php echo $contact;?></td>
                                <td><?php echo $email;?></td>
                                <td><?php echo $address;?></td>
                                <td>
                                    <a href="update-order.php?id=<?php echo $id;?>" id="btn-secondary">Update Order</a>
                                </td>
                            </tr>
                            <?php
                        }
                    }
                    else
                    {
                        ?>
                            <tr>
                                There are no order in database
                                <td>N/A</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
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
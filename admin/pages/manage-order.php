<?php include('../partials/menu.php');?>

<!--Main Contect-->
<section id="main-content">
    <h1 id="title">Manage Order</h1>
    <form>
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

                $get_res = mysqli_query($con, $get_query);

                if($get_res == true)
                {
                    $count = mysqli_num_rows($get_res);

                    if($count > 0)
                    {
                        while($count = mysqli_fetch_assoc($get_res))
                        {
                            $num = 1;
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
                                <td><?php echo $num ++;?></td>
                                <td><?php echo $food;?></td>
                                <td><?php echo $price;?></td>
                                <td><?php echo $qty;?></td>
                                <td><?php echo $total?></td>
                                <td><?php echo $stat;?></td>
                                <td><?php echo $name;?></td>
                                <td><?php echo $contact;?></td>
                                <td><?php echo $email;?></td>
                                <td><?php echo $address;?></td>
                                <td>
                                    <a></a>
                                    <a></a>
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
    </form>
</section>

<?php include('../partials/footer.php')?>
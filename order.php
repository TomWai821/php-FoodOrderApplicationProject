<?php 
include("./partials-front/nav.php");
include("./partials-front/menu.php"); 
?>

<?php
    if(isset($_GET['id']))
    {
        $get_id = $_GET['id']; 

        $get_query = "SELECT * FROM tbl_food WHERE id = $get_id";

        $get_res = mysqli_query($con, $get_query);

        $count = mysqli_fetch_assoc($get_res);

        $title = $count['title'];
        
        $price = $count['price'];

        $image_name = $count['image_name'];
    }
    else
    {
        header('index.php');
    }
?>

    <body>
        <section id="order-page">
            <form action="" method="post" encrypt="multipart/form-data">
                <fieldset>
                    <legend>Selected food</legend>
                    <div id="selected-field">
                        <img src="./admin/img/food/<?php echo "$image_name"; ?>" alt="" width="100" height="100">
                        <div id="details">
                            <span><?php echo $title?></span>
                            <span id="order-price">$<?php echo $price; ?></span>
                            <span id="order-label">Quantity</span>
                            <input type="number" id="quantity" name="qty" min="0" value="1">
                    </div>
                </fieldset>

                <fieldset>
                    <legend>Delivery Details</legend>
                        <div id="details">
                            <span id="order-label">Full Name</span>
                            <input type="text" name="name" placeholder="Your Full Name">
                                    
                            <span id="order-label">Phone Number</span>
                            <input type="phone" name="contact" placeholder="Your Phone Number">
                                        
                            <span id="order-label">Email</span>
                            <input type="email" name="email" placeholder="Your Email">
                                        
                            <span id="order-label">Address</span>
                            <textarea name="address" placeholder="Your Address" rows="10"></textarea>
                                    
                            <input type="submit" name="submit" id='order-btn' value='Order'>
                        </div>
                </fieldset>
            </form>
        </section>
<?php
    if(isset($_POST['submit']))
    {
        $qty = $_POST['qty'];
        $name = $_POST['name'];
        $contact = $_POST['contact'];
        $email = $_POST['email'];
        $address = $_POST['address'];

        $total = $price * $qty;
        $date = date("Y-m-d H:i:s");
        $status = "Ordered";

        $sql_query = "INSERT INTO tbl_order SET 
            food = '$title',
            qty = $qty,
            total = $total,
            order_date = '$date',
            stat = '$status',
            customer_name = '$name',
            customer_contact = '$contact',
            customer_email = '$email',
            customer_address = '$address'
            ";

        $res = mysqli_query($con, $sql_query);

        if($res == true)
        {
            echo "
            <script>
                alert('Order Successfully! Thank you!');
                window.location = 'index.php';
            </script>";
        }
        else
        {
            echo "
            <script>
                alert('Order Failed');
                window.location = 'index.php';
            </script>";
        }
    }
?>

<?php include("./partials-front/footer.php"); ?>

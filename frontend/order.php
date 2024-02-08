<?php 
include("./partials-front/nav.php");
include("./partials-front/menu.php"); 
?>
<body>
        <section id="order-page">
            <fieldset>
                <legend>Selected food</legend>
                <div id="selected-field">
                    <img src="image/pizza.jpg" alt="" width="100" height="100">
                    <form id="details">
                        <span>Food Title</span>
                        <span id="order-price">$2.3</span>
                        <span id="order-label">Quantity</span>
                        <input type="number" id="quantity" name="quantity" min="0">
                    </form>
                </div>
            </fieldset>

            <fieldset>
                <legend>Delivery Details</legend>
                    <form id="details">
                        <span id="order-label">Full Name</span>
                        <input type="text" id="" name="full_name" placeholder="Your Full Name">
                                
                        <span id="order-label">Phone Number</span>
                        <input type="phone" id="" name="phone_number" placeholder="Your Phone Number">
                                    
                        <span id="order-label">Email</span>
                        <input type="email" id="" name="email" placeholder="Your Email">
                                    
                        <span id="order-label">Address</span>
                        <input type="text" id="" name="address" placeholder="Your Address" rows="10">
                                    
                    </form>
            </fieldset>
            
        </section>

<?php include("./partials-front/footer.php"); ?>

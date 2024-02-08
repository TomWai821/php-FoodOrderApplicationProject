<?php 
include("./partials-front/nav.php");
include("./partials-front/menu.php");
include("./partials-front/search.php");
?>
        
    <body>
        <section id="explore">
            <h1 id="text-Title">Explore Foods</h1>
            <div id="food">
                <div id="card-pizza">
                    <span id="foodName">Pizza</span>
                </div>

                <div id="card-burger">
                    <span id="foodName">Burger</span>
                </div>

                <div id="card-momo">
                    <span id="foodName">Momo</span>
                </div>
            </div>
        </section>

        <section id="menu">
            <h1>Food Menu</h1>
            <div id="order-board">
                <div id="food-list">

                    <div id="food-card">
                        <img src="image/menu-pizza.jpg" alt="">
                        <div id="food-text">
                            <span id="food-title">Food Title</span>
                            <span id="food-price">$2.3</span>
                            <span id="food-description">Made with Italian Sause, Chicken and organic vegatables</span>
                            <a href="order.php" id="food-btn">Order Now</a>
                        </div>
                    </div>

                    <div id="food-card">
                        <img src="image/menu-burger.jpg" alt="">
                        <div id="food-text">
                            <span id="food-title">Smoky Burger</span>
                            <span id="food-price">$2.3</span>
                            <span id="food-description">Made with Italian Sause, Chicken and organic vegatables</span>
                            <a href="order.php" id="food-btn">Order Now</a>
                        </div>
                    </div>

                    <div id="food-card">
                        <img src="image/menu-momo.jpg" alt="">
                        <div id="food-text">
                            <span id="food-title">Chicken Steam Momo</span>
                            <span id="food-price">$2.3</span>
                            <span id="food-description">Made with Italian Sause, Chicken and organic vegatables</span>
                            <a href="order.php" id="food-btn">Order Now</a>
                        </div>
                    </div>

                    <div id="food-card">
                        <img src="image/menu-pizza.jpg" alt="">
                        <div id="food-text">
                            <span id="food-title">Food Title</span>
                            <span id="food-price">$2.3</span>
                            <span id="food-description">Made with Italian Sause, Chicken and organic vegatables</span>
                            <a href="order.php" id="food-btn">Order Now</a>
                        </div>
                    </div>

                    <div id="food-card">
                        <img src="image/menu-burger.jpg" alt="">
                        <div id="food-text">
                            <span id="food-title">Smoky Burger</span>
                            <span id="food-price">$2.3</span>
                            <span id="food-description">Made with Italian Sause, Chicken and organic vegatables</span>
                            <a href="order.php" id="food-btn">Order Now</a>
                        </div>
                    </div>

                    <div id="food-card">
                        <img src="image/menu-momo.jpg" alt="">
                        <div id="food-text">
                            <span id="food-title">Chicken Steam Momo</span>
                            <span id="food-price">$2.3</span>
                            <span id="food-description">Made with Italian Sause, Chicken and organic vegatables</span>
                            <a href="order.php" id="food-btn">Order Now</a>
                        </div>
                    </div>

                </div>
            </div>
            
            <a href="#" id="link-other">See all food</a>
        </section>

<?php include("./partials-front/footer.php"); ?>
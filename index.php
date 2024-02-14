<?php 
include("./partials-front/nav.php");
include("./partials-front/menu.php");
?>
        
<body>
    <header>
        <section id="search">
            <form method="" action="post" encrypt="mutlipart/form-data">
                <input type="text" name="search" placeholder="Search for food...">
                <input type="submit" name="submit" id="search-btn" value="Search">
            </form>
        </section>
    </header>

    <section id="explore">
        <h1>Explore Foods</h1>
            <div id="food">
                <?php
                $sql_query = "SELECT * FROM tbl_category LIMIT 3";

                $res = mysqli_query($con, $sql_query);

                if($res == true)
                {
                    $rows = mysqli_num_rows($res);

                    if($rows > 0)
                    {
                        while($rows = mysqli_fetch_assoc($res))
                        {
                            $title = $rows['title'];
                            $image_name = $rows['image_name'];

                            ?>
                            <div>
                                <img src="./admin/img/category/<?php echo "$image_name"; ?>" alt="">
                                <span id="foodName"><?php echo $title;?></span>
                            </div>
                            <?php
                        }
                    }
                }
                ?>
            </div>
            <a href="categories.php" id="link-other">See all Category</a>
    </section>

    <section id="menu">
        <div id="order-board">
            <h1>Food Menu</h1>
            <div id="food-list">
            <?php
                $sql_query = "SELECT * FROM tbl_food WHERE active = 'Yes' LIMIT 6";

                $res = mysqli_query($con, $sql_query);
                
                $row = mysqli_num_rows($res);
                if($row > 0)
                {
                    while($row = mysqli_fetch_assoc($res))
                    {
                        $id = $row['id'];
                        $title = $row['title'];
                        $description = $row['description'];
                        $price = $row['price'];
                        $image_name = $row['image_name'];
                        ?>
                            <div id="food-card">
                                <img src="./admin/img/food/<?php echo "$image_name"; ?>" alt="" height='100px' width='100px'>
                                <div id="food-text">
                                    <span id="food-title"><?php echo $title;?></span>
                                    <span id="food-price">$ <?php echo $price;?></span>
                                    <span id="food-description"><?php echo $description;?></span>
                                    <a href="order.php?id=<?php echo $id;?>" id="food-btn">Order Now</a>
                                </div>
                            </div>
                        <?php
                    }
                }
                ?>
                </div>
               
            </div>
        </div>
        <a href="foods.php" id="link-other">See all food</a>
    </section>
<?php include("./partials-front/footer.php"); ?>
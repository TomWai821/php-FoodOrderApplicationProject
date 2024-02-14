<?php 
include("./partials-front/nav.php");
include("./partials-front/menu.php");
?>

<body>

    <header>
        <section id="search">
            <form action='' method='post' encrypt='multipart/form-data'>
                <input type="text" name="search" placeholder="Search for food...">
                <input type="submit" name="submit" id="search-btn" value="Search">
            </form>
        </section>
    </header>

    <section id="menu">
        <div id="order-board">
            <h1>Food Menu</h1>
            <div id="food-list">
                <?php
                    $sql_query = "SELECT * FROM tbl_food WHERE active = 'Yes'";

                    // active while search input not null
                    if(isset($_POST['submit']))
                    {
                        // Get search input
                        // $search = $_POST['search'];
                        $search = mysqli_real_escape_string($con, $_POST['search']);

                        if($search != "")
                        {
                            // Insert this query to $sql_query
                            $sql_query .= " AND title LIKE '%$search%' OR description LIKE '%$search%'";
                        }
                    }

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
    </section>

<?php include("./partials-front/footer.php"); ?>
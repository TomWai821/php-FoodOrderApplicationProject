<?php 
include("partials-front/menu.php");
include("partials-front/nav.php");
?>

<body>
    <section id="explore">
        <h1>Explore Foods</h1>
            <div id="food">
                <?php
                $sql_query = "SELECT * FROM tbl_category";

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
    </section>

<?php include("partials-front/footer.php")?>
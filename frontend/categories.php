<?php 
include("./partials-front/menu.php");
include("./partials-front/nav.php");
?>

<body>

    <section id="explore" style="padding-top: 100px;">
        <h1 id="text-Title">Explore Foods</h1>
            <div id="food">
                <?php

                    //Display all the cateories that are active

                    //SQL Query
                    $sql_query = "SELECT * FROM tbl_category WHERE active='Yes'";

                    //Execute the Query
                    $res = mysqli_query($con, $sql_query);

                    //Count the rows
                    $count = mysqli_num_rows($res);

                    //Check weather categories avaliable or not
                    if($count > 0)
                    {
                        while($row=mysqli_fetch_assoc($res))
                        {
                            $id = $row['id'];
                            $title = $row['title'];
                            $image_name= $row['image_name'];
                            ?>
                            <div>
                                <?php
                                if($image_name = "")
                                {
                                    echo "<span>Image not found</span>";
                                }
                                else
                                {
                                    ?>
                                    <img src="image/<?php echo $image_name; ?>" alt="">
                                    <?php
                                }
                                ?>
                                <span id="foodName"><?php echo $title; ?></span>
                            </div>
                        <?php
                        }
                    }
                    else
                    {
                        echo "<span>Category not found</span>";
                    }
                ?>
            </div>
    </section>

<?php include("./partials-front/footer.php"); ?>
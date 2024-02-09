<?php include('../partials/menu.php'); ?>
<!--Main Contect-->
<section id="main-content">
    <h1 id="title">Manage Food</h1>

    <a href="add-food.php" id="btn-add">Add Food</a>

    <table id="tables">
        <tr>
            <th>S.N.</th>
            <th>Title</th>
            <th>Price</th>
            <th>Image</th>
            <th>Featured</th>
            <th>Active</th>
            <th>Actions</th>
        </tr>

            <?php
                // Select all data from tbl_food
                $sql_query = 'SELECT * from tbl_food';

                $res = mysqli_query($con, $sql_query);

                $num = 1;

                if($res == TRUE){
                    $rows = mysqli_num_rows($res);

                    if($rows > 0)
                    {

                        while($rows = mysqli_fetch_assoc($res)){
                            $id = $rows['id'];
                            $title = $rows['title'];
                            $price = $rows['price'];
                            $image_name = $rows['image_name'];
                            $featured = $rows['featured'];
                            $active = $rows['active'];
                            ?>
                            <tr>
                                <td><?php echo $num++;?></td>
                                <td><?php echo $title;?></td>
                                <td><?php echo $price;?></td>
                                <td>
                                    <?php 
                                    if($image_name=="")
                                    {
                                        echo "Image not Added";
                                    }
                                    else
                                    {
                                        // Display Image while have image
                                        ?>
                                            <img src="../img/food/<?php echo $image_name;?>" height="150px" width="250px"/>
                                        <?php
                                    }
                                    ?>
                                </td>
                                <td><?php echo $featured;?></td>
                                <td><?php echo $active;?></td>
                                <td>
                                    <a href='update-food.php?id=<?php echo $id;?>' id='btn-secondary'>Update Food</a>
                                    <a href="../api/delete-food-api.php?id=<?php echo $id;?>&image_name=<?php echo "$image_name";?>" id='btn-danger'>Delete Food</a>
                                </td>
                            </tr>
                            <?php
                        }
                    }
                    else
                    {
                        ?>
                        <!--Display Something while there are nothing in database-->
                        <tr>
                            There are no data in database
                                <td>N/A</td>
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
        </tr>
    </table>
</section>

<?php include('../partials/footer.php')?>
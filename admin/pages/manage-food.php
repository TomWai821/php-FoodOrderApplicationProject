<?php include('../partials/menu.php'); ?>
<!--Main Contect-->
<section id="main-content">
    <h1 id="title">Manage Food</h1>

    <a href="add-food.php" id="btn-add">Add Food</a>

    <form action="" method="post" encrypt="multipart/form-data">
        <table id="fliter">
            <tr>
                <td>
                    <span id="fliter-title">Title:</span>
                    <input type='text' name="fliter-title" id="fliter-inputfield" placeholder="Input Title">
                </td>

                <td>
                    <span id="fliter-title">Price:</span>
                    <select name="fliter-price" id="fliter-select">
                        <option value="">-</option>
                        <option value="Low">$0 - $4</option>
                        <option value="Medium">$5 - $10</option>
                        <option value="High">$10+</option>
                    </select>
                </td>

                <td>
                    <span id="fliter-title">Featured:</span>
                    <select name="fliter-featured" id="fliter-select">
                        <option value="">-</option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                    </select>
                </td>

                <td>
                    <span id="fliter-title">Active:</span>
                    <select name="fliter-active" id="fliter-select">
                        <option value="">-</option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                    </select>
                </td>

                <td>
                    <input type="submit" name="fliter-submit" id="btn-primary" value="Search">
                </td>
            </tr>
        </table>
    </form>

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
                $sql_query = "SELECT * from tbl_food";

                if(isset($_POST['fliter-submit']))
                {
                    $fliter_title = mysqli_real_escape_string($con, $_POST['fliter-title']);
                    $fliter_price = $_POST['fliter-price'];
                    $fliter_featured = $_POST['fliter-featured'];
                    $fliter_active = $_POST['fliter-active'];

                    // Insert String to Query while any inputfield have data
                    if($fliter_title != "" || $fliter_price !="" || $fliter_featured != "" || $fliter_active != "")
                    {
                        $sql_query .= " WHERE";

                        // Insert String to Query while fliter_title not null
                        if($fliter_title != "")
                        {
                            $sql_query .= " `title` LIKE '%$fliter_title%'";
                        }

                        // Insert String to Query while fliter_price not null
                        if($fliter_price != "")
                        {
                            if($fliter_title != "")
                            {
                                $sql_query .= " AND";
                            }

                            switch($fliter_price)
                            {
                                // Query While user select Low Option
                                case "Low":
                                    $sql_query .= " price BETWEEN 0 AND 4";
                                    break;

                                //  Query While user select Medium Option
                                case "Medium":
                                    $sql_query .= " price BETWEEN 5 AND 10";
                                    break;

                                //  Query While user select High Option
                                case "High":
                                    $sql_query .= " price > 10";
                                    break;
                            }
                        }

                        // Insert String to Query while fliter_featured not null
                        if($fliter_featured != "")
                        {
                            if($fliter_title != "" || $fliter_price != "")
                            {
                                $sql_query .= " AND";
                            }

                            $sql_query .= " featured = '$fliter_featured'";
                        }

                        // Insert String to Query while fliter_active not null
                        if($fliter_active != "")
                        {
                            if($fliter_title != "" || $fliter_price != "" || $fliter_featured != "")
                            {
                                $sql_query .= " AND";
                            }

                            $sql_query .= " active = '$fliter_active'";
                        }
                    }
                }

                $res = mysqli_query($con, $sql_query);

                $num = 1;

                if($res == TRUE){
                    $rows = mysqli_num_rows($res);

                    if($rows > 0)
                    {

                        while($rows = mysqli_fetch_assoc($res))
                        {
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
                                <td>
                                    <?php 
                                        if($price == 0)
                                        {
                                            echo "Free";
                                        }
                                        else
                                        {
                                            echo $price;
                                        }
                                    ?>
                                </td>
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
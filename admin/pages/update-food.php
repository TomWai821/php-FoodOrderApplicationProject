<?php include("../partials/menu.php");?>

<?php
    if(isset($_GET['id']))
    {
        $id = $_GET['id'];

        $sql_query = "SELECT * from tbl_food WHERE id = $id";

        $res = mysqli_query($con, $sql_query);

        $row = mysqli_fetch_assoc($res);

        $title = $row['title'];
        $description = $row['description'];
        $price = $row['price'];
        $current_image = $row['image_name'];
        $current_category = $row['category_id'];
        $featured = $row['featured'];
        $active = $row['active'];
    }else{
        header("./manage-food.php");
    }
?>

<section id="main-content">
    <h1 id="title">Update Food</h1>

    <form action="" method="post" enctype="multipart/form-data" >
        <table>
            <tr>
                <td>Title:</td>
                <td>
                    <input type='text' name='title' placeholder='Title of the Food' value="<?php echo "$title"?>"/>
                </td>
            </tr>

            <tr>
                <td>Description:</td>
                <td>
                    <textarea name='description' placeholder='Description of the food' cols='30' rows='5'><?php echo "$description"?></textarea>
                </td>
            </tr>

            <tr>
                <td>Price:</td>
                <td>
                    $ <input type='number' name='price' step='0.1' min='0.0' value="<?php echo "$price"?>"/>
                </td>
            </tr>

            <tr>
                <td>Current Image:</td>
                <td>
                    <?php
                    if($current_image == ""){
                        echo "Image not Avaliable";
                    }
                    else
                    {
                        ?>
                        <img src="../img/food/<?php echo $current_image;?>" width="250px" height="150px"/>
                        <?php
                    }
                    ?>
                </td>
            </tr>

            <tr>
                <td>Select New Image:</td>
                <td>
                    <input type="file" name="image">
                </td>
            </tr>

            <tr>
                <td>Category:</td>
                <td>
                    <select name='category'>
                        <?php
                            //  Select query to get data
                            $sql_query = "SELECT * FROM tbl_food WHERE active='Yes'";
                            //  send Select query to database
                            $res = mysqli_query($con, $sql_query);
                            // count how many rows are 'Yes' in active columns
                            $count = mysqli_num_rows($res);

                            if($count > 0)
                            {
                                $category_title = $row['title'];
                                $category_id = $row['id'];
                                ?>
                               <option value='$category_id'><?php echo $category_id; ?></option>;
                               <?php
                            }
                            else
                            {
                                echo "<option value='0'Category Not Avaliable</option>";
                            }
                        ?>
                    </select>
                </td>
            </tr>

            <tr>
                <td>Featured:</td>
                <td>
                    <input <?php if($featured="Yes") { echo "checked"; } ?> type='radio' name='featured' value='Yes'/> Yes
                    <input <?php if($featured="No") { echo "checked"; } ?> type='radio' name='featured' value='No'/> No
                </td>
            </tr>

            <tr>
                <td>Active:</td>
                <td>
                    <input <?php if($active="Yes") { echo "checked"; } ?> type='radio' name='active' value='Yes'/> Yes
                    
                    <input <?php if($active="No") { echo "checked"; } ?> type='radio' name='active' value='No'/> No
                </td>
            </tr>

            <tr>
                <td><input type="submit" name="submit" value="Update Food" id="btn-secondary"/></td>
            </tr>

        </table>
    </form>
</section>

<?php include("../partials/footer.php");?>
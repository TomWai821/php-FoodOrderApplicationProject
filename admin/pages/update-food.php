<?php include("../partials/menu.php");?>

<?php
    if(isset($_GET['id']))
    {
        $id = $_GET['id'];

        $sql_query2 = "SELECT * from tbl_food WHERE id = $id";

        $res2 = mysqli_query($con, $sql_query2);

        $row2 = mysqli_fetch_assoc($res2);

        $title = $row2['title'];
        $description = $row2['description'];
        $price = $row2['price'];
        $current_image = $row2['image_name'];
        $current_category = $row2['category_id'];
        $featured = $row2['featured'];
        $active = $row2['active'];
    }
    else
    {
        header("manage-food.php");
    }
?>

<section id="main-content">
    <h1 id="title">Update Food</h1>

    <form action="" method="post" enctype="multipart/form-data" >
        <table>
            <tr>
                <td>Title:</td>
                <td>
                    <input type='text' name='title' placeholder='New Title of the Food' value="<?php echo "$title"?>"/>
                </td>
            </tr>

            <tr>
                <td>Description:</td>
                <td>
                    <textarea name='description' placeholder='New Description of the Food' cols='30' rows='5'><?php echo "$description"?></textarea>
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
                        <img src="../img/food/<?php echo $current_image;?>" alt="" width="250px" height="150px"/>
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
                            $sql_query3 = "SELECT * FROM tbl_category WHERE active = 'Yes'";
                            //  send Select query to database
                            $res3 = mysqli_query($con, $sql_query3);
                            // count how many rows are 'Yes' in active columns
                            $count = mysqli_num_rows($res3);

                            if($count > 0)
                            {
                                while($count = mysqli_fetch_assoc($res3))
                                {
                                    $category_title = $count['title'];
                                    $category_id = $count['id'];
                                    ?>
                                        <option value='<?php echo $category_id?>'><?php echo $category_title; ?></option>;
                                    <?php
                                }
                            }
                            else
                            {
                                echo "<option value='0'>Category Not Avaliable</option>";
                            }
                        ?>
                    </select>
                </td>
            </tr>

            <tr>
                <td>Featured:</td>
                <td>
                    <input <?php if($featured == "Yes") { echo "checked"; } ?> type='radio' name='featured' value='Yes'/> Yes
                    <input <?php if($featured == "No") { echo "checked"; } ?> type='radio' name='featured' value='No'/> No
                </td>
            </tr>

            <tr>
                <td>Active:</td>
                <td>
                    <input <?php if($active == "Yes") { echo "checked"; } ?> type='radio' name='active' value='Yes'/> Yes
                    <input <?php if($active == "No") { echo "checked"; } ?> type='radio' name='active' value='No'/> No
                </td>
            </tr>

            <tr>
                <td>
                    <input type="hidden" name="id" value="<?php echo $id?>">
                    <input type="hidden" name="current_image" value="<?php echo $current_image?>">

                    <input type="submit" name="submit" value="Update Food" id="btn-secondary"/>
                </td>
            </tr>

        </table>
    </form>
</section>

<?php include("../partials/footer.php");?>

<?php
    if(isset($_POST['submit']))
    {
        $title = $_POST['title'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $current_image = $_POST['current_image'];
        $category = $_POST['category'];

        $featured = $_POST['featured'];
        $active = $_POST['active'];
        
        if(isset($_FILES['image']['name']))
        {

            $image_name = $_FILES['image']['name'];

            if($image_name != "")
            {
                // Get File Type (png, jpg or other types of file)
                $ext = end(explode('.', $image_name));

                // Change Image Name
                $image_name = "Food-Name-".rand(0000,9999).".".$ext;

                // Get Source Data Path
                $source_path = $_FILES['image']['tmp_name'];

                // Set File Destination Path
                $destination_path = "../img/food/$image_name";

                // Move file to destination path from source path
                $upload = move_uploaded_file($source_path, $destination_path);

                if($upload == false)
                {
                    echo "
                    <script>
                        alert('Failed to Upload Image');
                        window.location = 'manage-food.php';
                    </script>";

                    die();
                }

                if($current_image != "")
                {
                    $remove_path = "../img/food/$current_image";

                    $remove = unlink($remove_path);

                    if($remove == false)
                    {
                        echo "
                        <script>
                            alert('Failed to Remove Image');
                            window.location = 'manage-food.php';
                        </script>";

                        die();
                    }
                }
            }
            else
            {
                $image_name = $current_image;
            }

            $sql_query = "UPDATE tbl_food SET 
                title = '$title', 
                description = '$description', 
                price = $price, 
                image_name = '$image_name', 
                category_id = $category_id, 
                featured = '$featured',
                active = '$active'
                WHERE id = $id";

            $res = mysqli_query($con, $sql_query);

            if($res == true)
            {
                echo "
                <script>
                    alert('Update Food Successfully!');
                    window.location = 'manage-food.php';
                </script>";
            }
            else
            {
                echo "
                <script>
                    alert('Failed to Update Food!');
                    window.location = 'manage-food.php';
                </script>";
            }
        }
    }
?>
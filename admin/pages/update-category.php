<?php include('../partials/menu.php');?>

<?php
    if(isset($_GET['id']))
    {
        $id = $_GET['id'];

        $sql_query = "SELECT * from tbl_category WHERE id = $id";

        $res = mysqli_query($con, $sql_query);

        $row = mysqli_fetch_assoc($res);

        $title = $row['title'];

        $current_image = $row['image_name'];
        $featured = $row['featured'];
        $active = $row['active'];
    }
    else
    {
        header('manage-category.php');
    }
?>

<section id='main-content'>
    <h1 id='title'>Update Category</h1>

    <form action='' method='post' enctype='multipart/form-data'>
        <table>
            <tr>
                <td>Title</td>
                <td>
                    <input type='text' name='title' value="<?php echo "$title";?>" placeholder='New Title of Category'/>
                </td>
            </tr>

            <tr>
                <td>Current Image</td>
                <td>
                    <?php 
                    if($current_image == "")
                    {
                        echo "No Image Avaliable";
                    }
                    else
                    {
                        ?>
                        <img src="../img/category/<?php echo $current_image; ?>" alt='' width="250px" height="150px"/>
                        <?php
                    }
                    ?>

                </td>
            </tr>

            <tr>
                <td>Select New Image</td>
                <td><input type='file' name="image"></td>
            </tr>

            <tr>
                <td>Featured</td>
                <td>
                    <input <?php if($featured == "Yes") { echo "checked"; }?> type='radio' name='featured' value="Yes"/>Yes
                    <input <?php if($featured == "No") { echo "checked"; } ?> type='radio' name='featured' value="No"/>No
                </td>
            </tr>

            <tr>
                <td>Active</td>
                <td>
                    <input <?php if($active == "Yes") { echo "checked"; } ?> type='radio' name='active' value="Yes"/>Yes
                    <input <?php if($active == "No") { echo "checked"; } ?> type='radio' name='active' value="No"/>No
                </td>
            </tr>

            <tr>
                <td><input type='submit' name='submit' id='btn-secondary' value='Update Category'/></td>
            </tr>
        </table>
    </form>
</section>

<?php include('../partials/footer.php');?>

<?php
    if(isset($_POST['submit']))
    {
        $title = $_POST['title'];

        if(isset($_POST['featured']))
        {
            $featured = $_POST['featured'];
        }
        else
        {
            $featured = "No";
        }
       
        if(isset($_POST['active']))
        {
            $active = $_POST['active'];
        }
        else
        {
            $active = "No";
        }

        
        if(isset($_FILES['image']['name']))
        {
            $image_name = $_FILES['image']['name'];

            if($image_name != "")
            {
                $ext = end(explode('.', $image_name));

                $image_name = "Category-Name-".rand(0000,9999).".".$ext;

                $source_path = $_FILES['image']['tmp_name'];

                $destination_path = "../img/category/$image_name";
                
                // Move  the Upload file to the directory
                $upload = move_uploaded_file($source_path, $destination_path);

                if($upload == false)
                {
                    echo "
                    <script>
                        alert('Failed to Upload Image!');
                        window.location = 'manage-category.php';
                    </script>";

                    die();
                }

                if($current_image != ""){
                    $remove_path = "../img/category/$current_image";

                    $remove = unlink($remove_path);

                    if($remove == false)
                    {
                        echo "
                        <script>
                            alert('Failed to Remove Image!');
                            window.location = 'manage-category.php';
                        </script>";

                        die();
                    }
                }
            }
            else
            {
                $image_name = $current_image;
            }

        }
        

        $sql_query = "UPDATE tbl_category SET title='$title', image_name='$image_name', active='$active', featured = '$featured' WHERE id = $id";

        $res = mysqli_query($con, $sql_query);

        if($res == true)
        {
            echo "
            <script>
                alert('Update Category Successfully!');
                window.location = 'manage-category.php';
            </script>";
        }else
        {
            echo "
            <script>
                alert('Failed to Update Category!');
                window.location = 'manage-category.php';
            </script>";
        }
        
    }
?>
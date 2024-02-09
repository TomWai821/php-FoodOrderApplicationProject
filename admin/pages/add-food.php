<?php include('../partials/menu.php'); ?>

    <section id='main-content'> 
        <h1 id='title'>Add Food</h1>
        <form action="" method="post" enctype="multipart/form-data" >
            <table>
                <tr>
                    <td>Title:</td>
                    <td>
                        <input type='text' name='title' placeholder='Title of the Food'/>
                    </td>
                </tr>

                <tr>
                    <td>Description:</td>
                    <td>
                        <textarea name='description' placeholder='Description of the food' cols='30' rows='5'></textarea>
                    </td>
                </tr>

                <tr>
                    <td>Price:</td>
                    <td>
                        $ <input type='number' name='price' value='0.0' step='0.1' min='0.0'/>
                    </td>
                </tr>

                <tr>
                    <td>Select Image:</td>
                    <td>
                        <input type="file" name="image" >
                    </td>
                </tr>

                <tr>
                    <td>Category:</td>
                    <td>
                        <select name='category'>
                            <option value='1'>Food</option>
                            <option value='2'>Snacks</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>Featured:</td>
                    <td>
                        <input type='radio' name='featured' value='Yes'/> Yes

                        <input type='radio' name='featured' value='No'/> No
                    </td>
                </tr>

                <tr>
                    <td>Active:</td>
                    <td>
                        <input type='radio' name='active' value='Yes'/> Yes
                        
                        <input type='radio' name='active' value='No'/> No
                    </td>
                </tr>

                <tr>
                    <td>
                        <input type='submit' name='submit' value='Add Food' id='btn-add'/>
                    </td>
                </tr>
            </table>
        </form>
    </section>

<?php include('../partials/footer.php'); ?>

<?php
    
if(isset($_POST['submit'])){

    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $category = $_POST['category'];

    // Get featured value if set
    if(isset($_POST['featured']))
    {
        $featured = $_POST['featured'];
    }
    else
    {
        $featured = "No"; // Setting the Default Value
    }

    // Get active value if set
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

            $image_name = "Food-Name-".rand(0000,9999).".".$ext;

            $src = $_FILES['image']['tmp_name'];

            // Upload the food image to img file
            $upload = move_uploaded_file($src, "../img/food/$image_name");

            if($upload == false)
            {
                echo "
                <script>
                    alert('Failed to Upload Image!');
                    window.location = 'manage-food.php';
                </script>";
            }
        }
    }
            
    

    $sql_query = "INSERT INTO tbl_food SET 
        title='$title', 
        description = '$description', 
        price = $price, 
        image_name='$image_name', 
        category_id = '$category',
        featured = '$featured', 
        active = '$active'
    ";
    
    $res = mysqli_query($con, $sql_query) or die(mysqli_error());


    if($res == TRUE)
    {
        echo "
        <script>
            alert('Add Food successfully!');
            window.location = 'manage-food.php';
        </script>";
    }else{
        echo "<script> alert('Failed to Add Food!'); </script>";
    }
    

    
}
?>
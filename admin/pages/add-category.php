<?php include('../partials/menu.php');?>

    <section id="main-content">
        <h1 id="title">Add Category</h1>

        <form action='' method='post' enctype='multipart/form-data'>
            <table>

                <tr>
                    <td>Title:</td>
                    <td><input type='text' name='title' placeholder='Title of the Food'></td>
                </tr>

                <tr>
                    <td>Select Image:</td>
                    <td><input type='file' name='image'></td>
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
                    <td><input type='submit' name='submit' value='Add Category' id='btn-add'></td>
                </tr>
            </table>
        </form>
    </section>
<?php include('../partials/footer.php');?>

<?php
if(isset($_POST['submit'])){

    $title = $_POST['title'];

    // Get featured value if user setted
    if(isset($_POST['featrued']))
    {
        $featured = $_POST['featured'];
    }
    else
    {
        $featured = "No";
    }

    // Get active value if user setted
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

            $src = $_FILES['image']['tmp_name'];
            
            // Move  the Upload file to the directory
            $upload = move_uploaded_file($src, "../img/category/$image_name");

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

    $sql_query = "INSERT INTO tbl_category SET title = '$title', image_name = '$image_name', active = '$active', featured = '$featured'";

    $res = mysqli_query($con, $sql_query);

    if($res == true)
    {
        echo "
        <script>
            alert('Add Category Successfully');
            window.location = 'manage-category.php';
        </script>";
    }
    else
    {
        echo "
        <script>
            alert('Failed to Add Category!');
            window.location = 'manage-category.php';
        </script>";
    }
}
?>
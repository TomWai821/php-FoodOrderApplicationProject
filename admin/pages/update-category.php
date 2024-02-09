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

    <form action='' method='pose' encrypt='multipart/form-data'>
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
                <td>
                    <input type='file' name='image'>
                </td>
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
                <td><input type='submit' id='btn-secondary' value='Update Category'/></td>
            </tr>
        </table>
    </form>
</section>

<?php include('../partials/footer.php');?>

<?php
    
?>
<?php
    include('../config/constants.php');

    $id = $_GET['id'];
    $image_name = $_GET['image_name'];

    if($image_name != "")
    {
        $path = "../img/category/".$image_name;

        $remove = unlink($path);

        if($remove == false)
        {
            echo "
            <script>
                alert('Failed to Delete Image!');
                window.location = '../pages/manage-category.php';
            </script>";
        }
    }

    $sql_query = "DELETE FROM tbl_category WHERE id = $id";

    $res = mysqli_query($con, $sql_query);

    if($res == true)
    {
        echo "
        <script>
            alert('Delete Category Successfully!');
            window.location = '../pages/manage-category.php';
        </script>";
    }
    else
    {
        echo "
        <script>
            alert('Failed to Delete Category!');
            window.location = '../pages/manage-category.php';
        </script>";
    }
?>
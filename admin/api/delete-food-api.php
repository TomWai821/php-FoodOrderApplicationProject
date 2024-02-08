<?php
    include("../config/constants.php");

    // Get the id and image name from food pages
    if(isset($_GET['id']) && isset($_GET['image_name']))
    {
        $id = $_GET['id'];
        $image_name = $_GET['image_name'];

        // Delete Image while $image_name is not null
        if($image_name != "")
        {
            // Get the image path
            $path = "../img/food/".$image_name;

            // Remove the image from folder
            $remove = unlink($path);

            if($remove == false)
            {
                // Send message while failed to remove image and redirect to manage-food page
                echo "
                <script>
                    alert('Failed to remove image');
                    window.location = '../pages/manage-food.php';
                <script>
                ";
                die();
            }
        }

        // Delete query to database
        $sql_query = "DELETE FROM tbl_food WHERE id = $id";

        $res = mysqli_query($con, $sql_query);

        if($res == TRUE)
        {
            // Send message for delete food successfully and redirect to manage-food page
            echo "
            <script>
                alert('Delete Food Successfully!');
                window.location = '../pages/manage-food.php';
            </script>";
        }
        else
        {
            // Send message for failed to delete food and redirect to manage-food page
            echo "
            <script>
                alert('Failed to Delete Food!');
                window.location = '../pages/manage-food.php';
            </script>";
        }
    }
    else
    {
        echo "<script> window.location = '../pages/manage-food.php'; </script>";
    }
?>
<?php include('../partials/menu.php');?>

<!--Main Contect-->
<section id="main-content">
    <h1 id="title">Manage Category</h1>

    <a href="add-category.php" id="btn-add">Add Category</a>

        <table id="tables">
            <tr>
                <th>S.N</th>
                <th>Title</th>
                <th>Image</th>
                <th>Featured</th>
                <th>Active</th>
                <th>Action</th>
            </tr>

            <?php
                $sql_query = "SELECT * FROM tbl_category";

                $res = mysqli_query($con, $sql_query);

                $num = 1;

                if($res == true)
                {
                    $rows = mysqli_num_rows($res);

                    if($rows > 0)
                    {
                        
                        while($rows = mysqli_fetch_assoc($res))
                        {
                            $id = $rows['id'];
                            $title = $rows['title'];
                            $image_name = $rows['image_name'];
                            $featured = $rows['featured'];
                            $active = $rows['active'];
                            ?>
                                <tr>
                                    <td><?php echo $num++;?></td>
                                    <td><?php echo $title;?></td>
                                    <td>
                                        <?php 
                                        if($image_name != "")
                                        {
                                        ?>
                                            <img src='../img/category/<?php echo $image_name;?>' alt='' width='250px' height='150px'>
                                        <?php
                                        }
                                        ?>
                                    </td>
                                    <td><?php echo $featured;?></td>
                                    <td><?php echo $active;?></td>
                                    <td>
                                        <a href="#" id='btn-secondary'>Update Category</a>
                                        <a href="#" id='btn-danger'>Delete Category</a>
                                    </td>
                                </tr>
                            <?php
                        }
                    }
                    else
                    {
                        ?>
                        <tr>
                            There are no category in database
                            <td>N/A</td>
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
        </table>
</section>

<?php include('../partials/footer.php')?>
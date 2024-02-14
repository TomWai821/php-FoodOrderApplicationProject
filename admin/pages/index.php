<?php include('../partials/menu.php');?>

    <!--Main Contect-->
    <section id="main-content">
        <h1 id="title">DashBoard</h1>
        <div id="dashboard">
            <div id="dashboard-card">
                <h1>
                    <?php
                        // Query to get data And set count(id) as Count
                        $get_query_category = "SELECT COUNT(id) AS Count FROM tbl_category WHERE active = 'Yes'";

                         // Send query to tbl_category
                        $res_category = mysqli_query($con , $get_query_category);

                        // Fetch the query result from tbl_category
                        $fetch_category = mysqli_fetch_assoc($res_category);

                        // Get Count column data from tbl_category
                        $count_category = $fetch_category['Count'];

                        if($count_category != 0){
                            // Display the count
                            echo $count_category;
                        }
                        else
                        {
                            echo "0";
                        }
                    ?>
                </h1>
                Categories
            </div>

            <div id="dashboard-card">
                <h1>
                    <?php
                        // Query to get data And set count(id) as Count
                        $get_query_food = "SELECT COUNT(id) AS Count FROM tbl_food WHERE active = 'Yes'";

                        // Send query to tbl_food
                        $res_food = mysqli_query($con , $get_query_food);

                        // Fetch the query result from tbl_food
                        $fetch_food = mysqli_fetch_assoc($res_food);

                        // Get Count column data from tbl_food
                        $count_food = $fetch_food['Count'];

                        if($count_food != 0){
                            // Display the count
                             echo $count_food;
                        }
                        else
                        {
                            echo "0";
                        }
                    ?>
                </h1>
                Foods
            </div>

            <div id="dashboard-card">
                <h1>
                    <?php
                        // Query to get data And set count(id) as Count
                        $get_query_order = "SELECT COUNT(id) AS Count FROM tbl_order";

                        // Send query to tbl_order
                        $res_order = mysqli_query($con , $get_query_order);

                        // Fetch the query result from tbl_order
                        $fetch_order = mysqli_fetch_assoc($res_order);

                        // Get Count column data from tbl_order
                        $count_order = $fetch_order['Count'];

                        if($count_order != 0)
                        {
                            // Display the count
                            echo $count_order;
                        }
                        else
                        {
                            echo "0";
                        }

                    ?>
                </h1>
                Total orders
            </div>

            <div id="dashboard-card">
                <h1>$ 
                    <?php
                        // Query to get data And set sum(price) as total
                        $get_query_total = "SELECT SUM(price) AS Total FROM tbl_order WHERE stat = 'Delivered'";

                        // Send query to tbl_order
                        $res_total = mysqli_query($con , $get_query_total);

                        // Fetch the query result from tbl_order
                        $fetch_total = mysqli_fetch_assoc($res_total);

                        // Get Total column data from tbl_order
                        $total = $fetch_total['Total'];
                        
                        if($total != 0)
                        {
                            // Display the Total
                            echo $total;
                        }
                        else
                        {
                            echo "0.00";
                        }
                    ?>
                </h1>
                Revenue Generated
            </div>
        </div>
    </section>

<?php include('../partials/footer.php');?>
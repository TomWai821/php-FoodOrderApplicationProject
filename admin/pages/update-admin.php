<?php include('../partials/menu.php');?>

    <!--Main Contect-->
    <section id="main-content">
        <h1 id="title">Update Admin</h1>

        <form action="../api/update-admin-api.php" method="POST" encrypt="multipart/form-data">
            <table>
                <tr>
                    <td>Full Name:</td>
                    <td><input type="text" name="full_name" placeholder="Your Full Name"></input></td>
                </tr>

                <tr>
                    <td>Username:</td>
                    <td><input type="text" name="username" placeholder="New Username"></input></td>
                </tr>

                <tr>
                    <td>
                        <input type="submit" name="submit" value="Update Admin" id="btn-secondary"/>
                    </td>
                </tr>
            </table>
        </form>
    </section>

<?php include('../partials/footer.php');?>
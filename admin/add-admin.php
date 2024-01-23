<?php include('partials/menu.php');?>

<div id="main-content">
    <h1 id="title">Add Admin</h1>

    <form action="" method="POST">
        <table>
            <tr>
                <td>Full Name:</td>
                <td><input type="text" name="full_name" placeholder="Enter Your Name"></td>
            </tr>

            <tr>
                <td>Username:</td>
                <td><input type="text" name="username" placeholder="Your Username"></td>
            </tr>

            <tr>
                <td>Password:</td>
                <td><input type="text" name="password" placeholder="Your Password"></td>
            </tr>

            <tr>
                <td><input type="submit" name="sumbit" value="Add Admin" id="btn-secondary"/></td>
            </tr>
        </table>
    </form>
</div>

<?php include('partials/footer.php');?>
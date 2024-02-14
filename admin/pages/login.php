<!DOCTYPE html>
<html>

    <head>
        <title>Food Order Website - Login</title>
        <link rel="stylesheet" href="../css/login.css">
        <link rel="stylesheet" href="../css/admin.css">
    </head>

    <body>
        <!--Main Contect-->
        <section id="login-page">
            <h1 id="title">Login</h1>
            <form action="" method="POST" encrypt="multipart/form-data">
                Username
                <input type='text' name='username' placeholder='Your Username'/>
                    
                Password
                <input type='password' name='password' placeholder='Password'/>
                            
                <input style='width: 175px;' type='submit' name='submit' id='btn-primary' value='Login'/>
            </form>
        </section>
    </body>
</html>

<?php
    include('../config/constants.php');

    if(isset($_POST['submit']))
    {
        $username = mysqli_real_escape_string($con, $_POST['username']);
        
        $raw_password = md5($_POST['password']);
        $password = mysqli_real_escape_string($con, $raw_password);

        $sql_query = "SELECT * from tbl_admin WHERE username = '$username' AND password = '$password' ";
        $res = mysqli_query($con, $sql_query);

        $count = mysqli_num_rows($res);

        if($count == 1){
            echo "
            <script>
                alert('Login Successfully!');
                window.location = 'index.php';
            </script>
            ";
            $_SESSION['user'] = $username; 
        }else{
            echo "
            <script>
                alert('Failed to login!');
            </script>
            ";
        }
    }
?>
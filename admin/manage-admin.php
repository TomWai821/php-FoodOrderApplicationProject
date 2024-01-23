<?php include('partials/menu.php');?>

<!--Main Contect-->
<section id="main-content">
    <h1 id="title">Manage Admin</h1>

    <a href="add-admin.php" id="btn-admin">Add Admin</a>

    <table id="table-admin">
        <tr>
            <th>S.N.</th>
            <th>Full Name</th>
            <th>Username</th>
            <th>Actions</th>
        </tr>

        <tr>
            <td>1.</td>
            <td>Whatever</td>
            <td>Whatever</td>
            <td>
                <a href="#" id="btn-update">Update Admin</a>
                <a href="#" id="btn-delete">Delete Admin</a>
            </td>
        </tr>
    </table>
</section>

<?php include('partials/footer.php')?>
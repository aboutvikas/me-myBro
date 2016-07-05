<?php include("checkUser&functions.php") ?>
<?php include("delete.php") ?>

<!-- calling deleteStudent function -->
<?php  deleteAdminUser(); ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    <link rel="icon" href="img/favicon.ico">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/view-page.css">
    <link rel="stylesheet" href="font/font-awesome/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="js/myalert&myconfirm.js"></script>
    <script type="text/javascript" src="js/modalbox.js"></script>
</head>
<body>
<!-- Side Navigation  -->
    <?php include("side_nav.php"); ?>
<!-- Close Side Navigation   -->
       
    <div class="page-content">
       
        <?php include("top_nav.php")  ?>
        <!--   Closing Top Nav    -->
           
        <div class="main-content">
            <div class="page-title">
                <h3>Users</h3>
            </div>
            <div class="all-users">
                <div class="view-table">
                    <h4>All Users</h4>
                    <table align="center">
                        <tr>
                            <th>User Image</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>Role</th>
                            <th>Update</th>
                            <th>Delete</th>
                        </tr>

                        <?php 

                            include("connection.php");

                            $query =" SELECT * FROM admin_user";
                            $select_query = mysqli_query($connection,$query);

                            if(!$select_query) die('Query Failed'.mysqli_error($connection));

                            while($row = mysqli_fetch_array($select_query)) {

                                $id=$row['id'];
                                $user_img =$row['img_path'];
                                $name =$row['name'];
                                $email =$row['email'];
                                $pass =$row['pass'];
                                $role =$row['role'];
                        ?>
                        <tr>
                            <td><img src="<?php echo $user_img; ?>"</td>
                            <td><?php echo $name; ?></td>
                            <td><?php echo $email; ?></td>
                            <td><?php echo $pass; ?></td>
                            <td><?php echo $role; ?></td>

                            <td><a href="myAccount.php?edit=<?php echo $id?>"><button class="btn btn-sm btn-default"><i class="fa fa-pencil"></i></button></a></td>

                            <td><button class="btn btn-sm btn-danger" onclick="myconfirm ('Are you sure that you want to permanently delete <br><b><?php echo $name; ?></b>', 'view_users.php?delete=<?php echo $id?>')"><i class="fa fa-trash"></i></button></td>
                        
                        </tr>

                        <?php } mysqli_close($connection); ?>
                    </table>
                </div>
            </div>
        </div>
    </div>

    </body>
</html>
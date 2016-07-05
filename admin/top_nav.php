<?php

if(!isset($_SESSION['user_id'])) {
    header("Location:index.php");
}

include("connection.php");
$query = "SELECT * FROM admin_user WHERE id = '{$_SESSION['user_id']}'";
$query_run = mysqli_query($connection,$query);
checkQuery($query_run);

$the_row = mysqli_fetch_array($query_run);
$the_name = $the_row['name']; 
$the_email = $the_row['email']; 
$the_user_img = $the_row['img_path'];

mysqli_close($connection);

?>

<!-- including top-nav.css -->
<link rel="stylesheet" href="css/top-nav.css">
<link rel="stylesheet" type="text/css" href="css/responsive.css">

<div class="top-nav">
    <div class="menu-icon" onclick="show_nav()"><i class="fa fa-bars"></i></div>
    <div class="user-search">
        <form method="get" name="admin-search">
            <input type="search" placeholder="Search Topic...">
        </form>
    </div>
    <div class="user">
        <span class="user-info">
            <?php echo $the_name; ?>
            <i class="user-email"><?php echo $the_email; ?></i>
        </span>
        <span class="user-thumb">
            <img class="user-image" src="<?php echo $the_user_img; ?>" height="45px" width="45px">
        </span>
        <ul class="user-dropdown">
            <li><a href="myAccount.php"><i class="fa fa-briefcase"></i>My Account</a></li>
            <li><a href="add_user.php"><i class="fa fa-user"></i>Add User</a></li>
            <li><a href="view_users.php"><i class="fa fa-users"></i>View Users</a></li>
            <li><a href="logout.php"><i class="fa fa-sign-out"></i>Logout</a></li>
        </ul>
    </div>
</div>
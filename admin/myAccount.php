<?php include("checkUser&functions.php") ?>

<?php
    
if(isset($_POST['edit_user'])) {
    include("connection.php");
    
    if(isset($_GET['edit'])) {
        $get_id = $_GET['edit'];
        $query = "SELECT id,img_path FROM admin_user WHERE id = '{$get_id}'";
    }
    else $query = "SELECT id,img_path FROM admin_user WHERE id = '{$_SESSION['user_id']}'";

    $query_run = mysqli_query($connection,$query);
    $row = mysqli_fetch_array($query_run);
    $db_id = $row['id']; 
    $db_user_img = $row['img_path']; 
    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $role = $_POST['role'];
    
//    if(strlen($pass)<8) $error = "Password length must 8 characters.";
    
    if($_FILES["user_img"]["error"] == 4) {
        $upload_dir = $db_user_img;
    }
    else {
        $imgFile = $_FILES['user_img']['name'];
        $tmp_dir = $_FILES['user_img']['tmp_name'];
        $imgType = $_FILES['user_img']['type'];
        $imgSize = $_FILES['user_img']['size'];

        $upload_dir = 'img/user_img/';

        // get image extension
        $imgExt = getImageExtension($imgType);

        // rename uploading image
        $userpic = $email.$imgExt;
        $upload_dir = $upload_dir.$userpic;

        // allow valid image file formats
        if($imgExt != ".jpg" && $imgExt != ".png" && $imgExt != ".gif"){
            $error = "Accept img only JPG, JPEG, PNG & GIF.";
        }
        // Check file size '5MB'
        if($imgSize > 5000000) $error = "Sorry, your file is too large(max=5MB)";
            
        //resize img to 800 resolution
        resizeImage($maxDim = 800);
        
        if(!isset($error)) {
            $move_img = move_uploaded_file($tmp_dir,$upload_dir);
            if(!$move_img) $error = "Error While Uploading..";
        }
        
    }
    
    if(!isset($error)) {
        
        $email = mysqli_real_escape_string($connection,$email);
        $query ="SELECT email FROM admin_user WHERE email= '{$email}' AND id!= '{$db_id}' ";
        $result=mysqli_query($connection,$query);
        checkQuery($result);
        $data=mysqli_num_rows($result);

        if($data){
            $error = "Email address already exist.";
            mysqli_close($connection);
        }
        else {
            $query = "UPDATE admin_user SET ";
            $query .= "name = '{$name}', ";
            $query .= "email = '{$email}', ";
            $query .= "pass = '{$pass}', ";
            $query .= "img_path = '{$upload_dir}', ";
            $query .= "role = '{$role}' ";
            $query .= "WHERE id = '{$db_id}'";

            $edit_query = mysqli_query ($connection,$query);

            if(!$edit_query) die('Query Failed'.mysqli_error($connection));

            mysqli_close($connection);
            $success_msg="User Details Updated Successfully";
        }
    }
}

//for echo user details in form

    include("connection.php");
    if(isset($_GET['edit'])) {
        $get_id = $_GET['edit'];
        $query = "SELECT * FROM admin_user WHERE id = '{$get_id}'";
    }
    else $query = "SELECT * FROM admin_user WHERE id = '{$_SESSION['user_id']}'";

    $query_run = mysqli_query($connection,$query);
    checkQuery($query_run);
    $row = mysqli_fetch_array($query_run);
    $db_id = $row['id']; 
    $db_name = $row['name']; 
    $db_email = $row['email']; 
    $db_pass = $row['pass'];
    $db_user_img = $row['img_path']; 
    $db_role = $row['role']; 
    mysqli_close($connection);

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Admin Panel</title>
        <link rel="icon" href="img/favicon.ico">
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <link rel="stylesheet" type="text/css" href="css/add-edit-page.css">
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
                <div class="edit-user col-1">
                    <div class="edit-form">
                    <form method="post" enctype="multipart/form-data">
                        <div class="user-img-back">
                           <div class="user-profile">
                                <div class="user-img">
                                    <img src="<?php echo $db_user_img; ?>" onclick="show_modal('u_img')">
                                    <label for="user_img">Change Photo</label>
                                    <input class="choose-file" name="user_img" id="user_img" type="file" accept="image/*">
                                </div>
                                <div class="user-details">
                                    <h3><?php echo $db_name; ?></h3>
                                    <p><?php echo $db_email; ?></p>
                                </div>
                            </div>
                        </div>
                        <?php if (isset($error)) error_msg($error); ?>
                        <?php if (isset($success_msg)) success_msg($success_msg);?>
                        
                        <label>ID</label><input type="number" name="id" value="<?php echo $db_id; ?>" disabled>
                        <label>Name</label><input type="text" name="name" value="<?php echo $db_name; ?>">
                        <label>Email</label><input type="email" name="email" value="<?php echo $db_email; ?>">
                        <label>Password</label><input type="text" name="pass" value="<?php echo $db_pass; ?>">
                        <label>Role</label>
                        <select  name="role">
                            <option value="<?php echo $db_role; ?>"><?php echo $db_role; ?></option>
                            <?php 
                            if ($db_role == "Admin") echo '<option value="Teacher">Teacher</option>';
                            else echo '<option value="Admin">Admin</option>';
                            ?>
                        </select>

                        <input type="submit" name="edit_user" value="Update">
                    </form>
                    </div>
                </div>
                <div class="closeable modal" id="u_img">
                    <div class="modal-content image">
                        <div class="modal-body">
                            <img src="<?php echo $db_user_img; ?>">
                        </div>
                    </div>
                </div>
            </div>
        </div>  
    </body>
</html>
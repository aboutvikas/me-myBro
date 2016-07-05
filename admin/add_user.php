<?php include("checkUser&functions.php") ?>


<?php

if(isset($_POST['add_user'])) {
    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $role = $_POST['role'];
    
    //password validation
    if(strlen($pass)<8) $error = "Password length must 8 characters.";
    
    if($_FILES["user_img"]["error"] == 4) {
        $upload_dir = 'img/user_img/noImg.jpg';
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
        $userpic = rand(1000,1000000).$imgExt;
        $upload_dir = $upload_dir.$userpic;

        // allow valid image file formats
        if($imgExt != ".jpg" && $imgExt != ".png" && $imgExt != ".gif"){
            $error = "Accept img only JPG, JPEG, PNG & GIF.";
        }
        // Check file size '5MB'
        if($imgSize > 5000000) $error = "Sorry, your file is too large(max=5MB)";

        if(!move_uploaded_file($tmp_dir,$upload_dir)) $error = "Error While Uploading..";
    }

    if(!isset($error)) {
        
        include("connection.php");
        $email = mysqli_real_escape_string($connection,$email);
        $query ="SELECT * FROM admin_user WHERE email= '{$email}' ";
        $result=mysqli_query($connection,$query);

        $data=mysqli_num_rows($result);

        if($data){
            $error = "Email address already exist.";
            mysqli_close($connection);
        }
        else {
            $query = "INSERT INTO admin_user (id, name, email, pass, img_path, role) ";
            $query.="VALUES ('', '$name', '$email', '$pass', '$upload_dir', '$role')";
            $query_run=mysqli_query($connection, $query);
            checkQuery($query_run);
            $success_msg="New User Added Successfully";
        }    
    }
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    <link rel="icon" href="img/favicon.ico">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/add-user.css">
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
                <h3>Add User</h3>
            </div>
            <div class="add-user col-1">
                <h3>New User Details</h3>
                <form method="post" enctype="multipart/form-data">
                    <?php if (isset($error)) echo '<div class="error"><span class="close-btn" onclick="close_div(this)"></span>'.$error.'</div>';  ?>

                    <?php if (isset($success_msg)) echo '<div class="success"><span class="close-btn" onclick="close_div(this)"></span>'.$success_msg.'</div>' ; ?>
                    <div class="input-group">
                        <span class="input-icon"><i class="fa fa-user"></i></span>
                        <input class="form-input" name="name" type="text" placeholder="Name" value="<?php if(isset($name)) echo $name;?>" required>
                    </div>
                    <div class="input-group">
                        <span class="input-icon"><i class="fa fa-envelope-o"></i></span>
                        <input class="form-input" name="email" type="email" placeholder="Email Address" value="<?php if(isset($email)) echo $email;?>" required>
                    </div>
                    <div class="input-group">
                        <span class="input-icon"><i class="fa fa-unlock"></i></span>
                        <input class="form-input" name="pass" type="password" placeholder="Password" required>
                    </div>
                    <select class="form-input" name="role" required>
                        <option value="" hidden disabled selected>Choose Role of New User</option>
                        <option value="Admin">Admin</option>
                        <option value="Teacher">Teacher</option>
                    </select>
                    <div class="input-group">
                        <span class="input-icon"><i class="fa">Profile Img..</i></span>
                        <input class="choose-file" name="user_img" type="file" accept="image/*">
                    </div>
                    <input type="submit" name="add_user" value="Add User">
                </form>
            </div>
        </div>
    </div>  
</body>
</html>
<?php
    session_start();
    if(isset($_SESSION['user_id'])) {
        header("Location:dashboard.php");
    }
?>
<?php

if (isset($_POST['login'])){
    include("connection.php");
    
    $email =$_POST['email'];
    $pass =$_POST['pass'];
    
    $email = mysqli_real_escape_string($connection,$email);
    $pass = mysqli_real_escape_string($connection,$pass);
    
    $query = "SELECT * FROM admin_user WHERE email = '{$email}' ";
    $select_query =  mysqli_query($connection,$query);
    if(!$select_query) die("Query Failed !!".mysqli_error($connection));
    
    
    $row = mysqli_fetch_array($select_query);
    $db_email =$row['email'];
    $db_pass =$row['pass'];
    $db_id =$row['id'];
    
    if ($email === $db_email && $pass === $db_pass) {
        $_SESSION['user_id']= $db_id;
        header("Location:dashboard.php");
    }
    else if ($email != $db_email) {
        $login_error = "Please check your email address.";
    }
    else if ($pass != $db_pass) {
        $login_error = "E-mail or Password was incorrect.";
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
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <link rel="stylesheet" href="font/font-awesome/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="js/modalbox.js"></script>
    <script type="text/javascript" src="js/modalbox.js"></script>
</head>
<body>
    <div class="login-container">
        <div class="login-header">
            <div class="login-content">
                <a href="index.php"><h1>RSMT</h1></a>
                <p>Dear user, log in to access the admin area!</p>
            </div>
        </div>
        <div class="login-form">
            <div class="login-content">
                <?php if (isset($login_error)) { ?>
                <div class="error">
                    <span class="close-btn" onclick="close_div(this);"></span>
                    <?php echo $login_error; ?>
                </div>
                <?php } ?>
                <form id="admin_login" method="post">
                    <div class="input-group">
                        <span class="input-icon"><i class="fa fa-envelope-o"></i></span>
                        <input class="form-input" name="email" type="email" placeholder="Email Address" value="<?php if(isset($email)) echo $email;?>" required>
                    </div>
                    <div class="input-group">
                        <span class="input-icon"><i class="fa fa-unlock"></i></span>
                        <input class="form-input" name="pass" type="password" placeholder="Password" required>
                    </div>
                    <input class="btn btn-block" type="submit" name="login" value="Login">
                    <em>-or-</em>
                </form>
                <button class="btn btn-block btn-info" onclick="show_modal('admin_reg')">Register</button>
                <div class="forget-div">   
                    <a href="#">Forgot your password?</a>
                </div>    
            </div>
        </div>
        <div class="closeable modal top" id="admin_reg">
            <div class="modal-content">
                <span class="close-btn" onclick="close_modal('admin_reg')"></span>
                <div class="modal-body">
                    <h2 style="margin:5px 0 15px 0;">RSMT</h2>
                   <form method="post" id="admin_reg">
                        <div class="input-group">
                            <span class="input-icon"><i class="fa fa-share"></i></span>
                            <input class="form-input" type="password" placeholder="Enter Special ID" required>
                        </div>   
                        <div class="input-group">
                            <span class="input-icon"><i class="fa fa-envelope"></i></span>
                            <input class="form-input" type="email" placeholder="Enter Email Address" required>
                        </div>
                        <div class="input-group">
                            <span class="input-icon"><i class="fa fa-unlock"></i></span>
                            <input class="form-input" type="password" placeholder="Enter Password" required>
                        </div>
                        <input type="submit" class="btn btn-lg btn-block btn-success" value="Register">
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
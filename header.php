<?php if (!isset($active_page)) $active_page=""; ?>

<?php
    if(isset($_SESSION['check_user'])) {
        include("connection.php");
        $query = "SELECT first_name FROM students WHERE id = '{$_SESSION['check_user']}' ";
        $select_query =  mysqli_query($connection,$query);

        $row = mysqli_fetch_array($select_query);
        $fname = $row['first_name'];

        mysqli_close($connection);
    }
?>
<header>
    <div class="container">
        <div class="header-left col-3" style="float:left;">
            <p><span style="font-weight:bold;">Call : </span>+91 542-2108316</p>
            <p class="link"><span style="font-weight:bold;">Email : </span><a href="mailto:mrvikas.seth@gmail.com">rsmt.ac.in@gmail.com</a></p>
        </div> 
        <div class="home col-3" style="padding-left:0%; float:left;">
            <a href="index.php"><img src="img/logo.png" width="100px" height="100px"></a>
        </div>
        <div class="header-right col-3 link" style="float:right;">                  
            <ul style="padding-bottom:4%;">
                <li><a href="#">About Us</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a  href="#" onclick="show_modal('mm');">Apply Now</a></li>
            </ul>
            <form class="search" name="search" method="get" action="#">
                <input type="text" name="search" id="search" placeholder="Search the Site.." size="24px">
            </form>
        </div>
        <div class="clearfix"></div>
    </div>
    <!--------------------------    Nav Bar   ----------------------------------------->
    <div class="container">
         <nav>
           <div class="closeable modal flip" id="mm">
                <div class="modal-content">
                    <div class="modal-header">
                        Iam header
                    </div>
                    <div class="modal-body">
                        Body
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-lg btn-danger" onclick="close_modal('mm')">Close</button>
                    </div>
                </div>
            </div>
            <div class="nav-menu">
                <label for="nav-button" class="nav-button">
                    <span><a href="index.php" style="float:left;">RSMT</a></span>
                    <span style="float:right; font-size:1.2em;">&#9776;</a></span>
                    <div class="clearfix"></div>
                </label>
                <input type="checkbox" id="nav-button">
                <ul class="nav-left" id="menu">
                    <li class="<?php if ($active_page == 'index') echo "active"; ?>"><a href="index.php">Home</a></li>
                    <li>
                        <a>Course &#9662;</a>
                        <ul class="hidden">
                            <li><a href="#">MCA</a></li>
                            <li><a href="#">MBA</a></li>
                            <li><a href="#">BCA</a></li>
                            <li><a href="#">BBA</a></li>
                        </ul>
                    </li>
                    <li>
                        <a>Facilities &#9662;</a>
                        <ul class="hidden">
                            <li><a href="#">Computer Lab</a></li>
                            <li><a href="#">Library</a></li>
                            <li><a href="#">Sport</a></li>
                            <li><a href="#">Hostel</a></li>
                            <li><a href="#">Cafetaria</a></li>
                        </ul>
                    </li>
                    <li class="<?php if ($active_page == 'contact') echo "active"; ?>"><a href="contact.php">Contact</a></li>
                    <li>
                        <a>About Us &#9662;</a>
                        <ul class="hidden">
                            <li><a href="#">Vision & Mission</a></li>
                            <li><a href="#">President's Message</a></li>
                            <li><a href="#">Varanasi City</a></li>
                            <li><a href="#">Chairman's Message</a></li>
                            <li><a href="#">Publications</a></li>
                        </ul>
                    </li>
                   <?php if(isset($_SESSION['check_user'])){ ?> 
                       <li style="float:right;"><a href="logout.php">Logout</a></li>
                       
                       <li class="<?php if ($active_page == 'student') echo "active"; ?>" style="float:right;"><a href="student.php"><?php echo $row['first_name']; ?></a></li>
                    
                    <?php }else{ ?>
                    <li class="<?php if ($active_page == 'register') echo "active"; ?>" style="float:right;"><a href="reg.php">Register</a></li>
                    <li style="float:right;"><a>Login</a>
                        <div class="login" id="login">
                            <form action="" method="post" onsubmit="return validation()">
                                <input type="email" id="userid" name="email" placeholder="Email" value="<?php if (isset($email)) echo $email; ?>" required>
                                <input type="password" id="pass" name="pass" placeholder="Password" required>
                                <a href="#">Forgotten your password?</a>
                                <input type="submit" name="login" id="submit" class="login-btn" value="Submit">
                            </form>
                        </div>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </nav>
    </div>      
</header>
<?php if(isset($login_error)) { ?>
        <div class="container">
            <div class="login-error">
               <span class="close-btn" onclick="close_div(this)"></span>
                <div class="error">
                    <?php echo $login_error;  ?>
                </div>
            </div>
        </div>
<?php } ?>
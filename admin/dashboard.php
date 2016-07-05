<?php include("checkUser&functions.php") ?>

<?php

//total student query
$sql = "SELECT * from students";
$total_std = countRow($sql);

//total message query
$sql = "SELECT * from user_contact";
$total_msg = countRow($sql);

//mca student query
$sql = "SELECT * from students WHERE course= 'MCA'";
$mca_stds = countRow($sql);

//mba student query
$sql = "SELECT * from students WHERE course= 'MBA'";
$mba_stds = countRow($sql);

//bca student query
$sql = "SELECT * from students WHERE course= 'BCA'";
$bca_stds = countRow($sql);
    
//bba student query
$sql = "SELECT * from students WHERE course= 'BBA'";
$bba_stds = countRow($sql);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    <link rel="icon" href="img/favicon.ico">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/dashboard.css">
    <link rel="stylesheet" href="font/font-awesome/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="js/modalbox.js"></script>
</head>
<body>
<!-- Side Navigation  -->
    <?php $active_page = "dashboard"; ?>
    <?php include("side_nav.php"); ?>
<!-- Close Side Navigation   -->
   
    <div class="page-content">
                   
        <?php include("top_nav.php")  ?>
        <!--   Closing Top Nav    -->
        
        <div class="main-content">
            <div class="welcome-msg">
                <span class="close-btn" onclick="this.parentNode.style.display='none';"></span>
                <h2>Welcome Administrator</h2>
                <p>What would you like to do today?</p>
            </div>
            <div class="page-title col-1">
                <h3>Dashboard</h3>
            </div>
            <div class="row">
                <div class="widget col-6">
                    <span class="w-title">Latest News</span>
                    <div class="w-icon">
                        <span><i class="fa fa-newspaper-o"></i></span>
                        <div class="w-num">5</div>
                        <div class="w-text">News</div>
                    </div>
                    <span class="w-bottom"><a href="#">View All</a></span>
                </div>
                <div class="widget col-6">
                    <span class="w-title">Event</span>
                    <div class="w-icon">
                        <span><i class="fa fa-calendar"></i></span>
                        <div class="w-num">4</div>
                        <div class="w-text">Event</div>
                    </div>
                    <span class="w-bottom"><a href="#">View All</a></span>
                </div>
                <div class="widget col-6">
                    <span class="w-title">New Messages</span>
                    <div class="w-icon">
                        <span><i class="fa fa-envelope-o"></i></span>
                        <div class="w-num"><?php echo $total_msg; ?></div>
                        <div class="w-text">Messages</div>
                    </div>
                    <span class="w-bottom"><a href="#">View All</a></span>
                </div>
                <div class="widget col-6">
                    <span class="w-title">All Students</span>
                    <div class="w-icon">
                        <span><i class="fa fa-users"></i></span>
                        <div class="w-num"><?php echo $total_std; ?></div>
                        <div class="w-text">Students</div>
                    </div>
                    <span class="w-bottom"><a href="view_student.php?view_all_std=View+All">View All</a></span>
                </div>
            </div>
            <!-- Course Deatils  -->
            <div class="row">
                <div class="widget col-6">
                    <span class="w-title">MCA</span>
                    <div class="w-icon">
                        <span><i class="fa fa-calculator"></i></span>
                        <div class="w-num"><?php echo $mca_stds; ?></div>
                        <div class="w-text">Students</div>
                    </div>
                    <span class="w-bottom"><a href="view_student.php?course=MCA&view_std=Submit">View All</a></span>
                </div>
                <div class="widget col-6">
                    <span class="w-title">MBA</span>
                    <div class="w-icon">
                        <span><i class="fa fa-calculator"></i></span>
                        <div class="w-num"><?php echo $mba_stds; ?></div>
                        <div class="w-text">Students</div>
                    </div>
                    <span class="w-bottom"><a href="view_student.php?course=MBA&view_std=Submit">View All</a></span>
                </div>
                <div class="widget col-6">
                    <span class="w-title">BCA</span>
                    <div class="w-icon">
                        <span><i class="fa fa-calculator"></i></span>
                        <div class="w-num"><?php echo $bca_stds; ?></div>
                        <div class="w-text">Students</div>
                    </div>
                    <span class="w-bottom"><a href="view_student.php?course=BCA&view_std=Submit">View All</a></span>
                </div>
                <div class="widget col-6">
                    <span class="w-title">BBA</span>
                    <div class="w-icon">
                        <span><i class="fa fa-calculator"></i></span>
                        <div class="w-num"><?php echo $bba_stds; ?></div>
                        <div class="w-text">Students</div>
                    </div>
                    <span class="w-bottom"><a href="view_student.php?course=BBA&view_std=Submit">View All</a></span>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
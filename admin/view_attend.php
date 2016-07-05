<?php include("checkUser&functions.php") ?>
<?php include("delete.php") ?>

<!-- calling deleteAttendance function -->
<?php  deleteAttendance(); ?>

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
    <?php $active_page = "active-attend"; ?>
    <?php include("side_nav.php"); ?>
<!-- Close Side Navigation   -->
   
    <div class="page-content">
                   
        <?php include("top_nav.php")  ?>
        <!--   Closing Top Nav    -->
        
        <div class="main-content">
            <div class="page-title">
                <h3>Attandance</h3>
            </div>
            <div class="view-form">
                <form name="register" action="view_attend.php" method="get">               
                    <h3>Enter Attendance Details</h3>           
                    <select id="course" name="course" required onchange="add_course_url(this)">
                         <option value="" selected hidden>Choose Course</option>
                         <option value="MCA" <?php if(@$_GET['course'] == "MCA") echo "selected";?> >MCA</option>
                         <option value="MBA" <?php if(@$_GET['course'] == "MBA") echo "selected";?> >MBA</option>
                         <option value="BCA" <?php if(@$_GET['course'] == "BCA") echo "selected";?> >BCA</option>
                         <option value="BBA" <?php if(@$_GET['course'] == "BBA") echo "selected";?> >BBA</option>
                     </select>
                     
                     <select id="sem" name="sem" required onchange="add_sub_url(this)">
                        <option value="" selected hidden>Choose Semester</option>
                        <option value="1" <?php if(@$_GET['sem'] == "1") echo "selected";?> >Semester 1</option>
                        <option value="2" <?php if(@$_GET['sem'] == "2") echo "selected";?> >Semester 2</option>
                        <option value="3" <?php if(@$_GET['sem'] == "3") echo "selected";?> >Semester 3</option>
                        <option value="4" <?php if(@$_GET['sem'] == "4") echo "selected";?> >Semester 4</option>
                        <option value="5" <?php if(@$_GET['sem'] == "5") echo "selected";?> >Semester 5</option>
                        <option value="6" <?php if(@$_GET['sem'] == "6") echo "selected";?> >Semester 6</option>
                     </select>

                    <select id="sub_name" name="sub_name" required>
                        <option value="" selected hidden>Choose Subject</option>
                        <?php subject_name(); ?>
                     </select>
                    <input type="month" name="month" required>
                    <input type="submit" name="view_attend" value="Submit">
                    <em>-or-</em>
                </form>
                <form method="get">
                    <input class="btn btn-lg btn-default" type="submit" name="view_all_attend" value="View All">
                </form>
            </div>
            
        <?php
            if (isset($_GET['view_attend']) || isset($_GET['view_all_attend'])) {
                
                $course = @$_GET['course'];
                $sem = @$_GET['sem'];
                $sub_name = @$_GET['sub_name'];
                $month = @$_GET['month'];
                $view_all = @$_GET['view_all_attend'];   
            ?>
            
            <div class="view-attend">
                <div class="view-table">
                   <h4 style="text-align:center;">All Attendance</h4>
                    <table align="center">
                        <tr>
                            <th>Roll No</th>
                            <th>Name</th>
                            <th>Course</th>
                            <th>Semester</th>
                            <th>Subject Name</th>
                            <th>Attendance</th>
                            <th>Total Class</th>
                            <th>Month</th>
                            <th>Percentage</th>
                            <th>Update</th>
                            <th>Delete</th>
                        </tr>

                        <?php 

                        include("connection.php");

                        if ($view_all == "View All") $query =" SELECT * FROM std_attend";

                        else $query =" SELECT * FROM std_attend WHERE course = '{$course}' AND semester = '{$sem}' AND subject = '{$sub_name}' AND month = '{$month}' ";

                        $select_query = mysqli_query($connection,$query);

                        checkQuery($select_query);

                        while($row = mysqli_fetch_array($select_query)) {

                            $id =$row['id'];
                            $roll_no =$row['roll_no'];
                            $name =$row['name'];
                            $course =$row['course'];
                            $semester = $row['semester'];
                            $subject = $row['subject'];
                            $attendance = $row['attendance'];
                            $total_class = $row['total_class'];
                            $month = $row['month'];
                        ?>
                        <tr>
                            <td><?php echo $roll_no; ?></td>
                            <td><?php echo $name; ?></td>
                            <td><?php echo $course; ?></td>
                            <td><?php echo $semester; ?></td>
                            <td><?php echo $subject; ?></td>
                            <td><?php echo $attendance; ?></td>
                            <td><?php echo $total_class; ?></td>
                            <td><?php echo $month; ?></td>
                            <td><i class="percent"><?php echo percentageCalc($attendance, $total_class); ?>%</i></td>

                            <td><a href="edit_attend.php?edit=<?php echo $id?>"><button class="btn btn-sm btn-default"><i class="fa fa-pencil"></i></button></a></td>

                            <td><button class="btn btn-sm btn-danger" onclick="myconfirm ('Are you sure that you want to permanently delete <br><b><?php echo $subject; ?></b>', 'view_attend.php?delete=<?php echo $id?>')"><i class="fa fa-trash"></i></button></td>

                        </tr>

                        <?php } //while loop ?>
                        <?php mysqli_close($connection); ?>

                    </table>
                </div>  
            </div>
            <?php } ?>
        </div>
    </div>
</body>
</html>
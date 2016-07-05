<?php include("checkUser&functions.php") ?>

<?php 

if(isset($_GET['submit'])){
    
    $course = $_GET['course'] ;
    $semester = $_GET['sem'] ;
    $month= $_GET['month'] ;
    $sub_name = $_GET['sub_name'] ;
    $attend_input = $_GET['attend_input'] ;
    
    include ("connection.php");
    
    //query for check attendance
    $check_attend = " SELECT * FROM std_attend WHERE ";
    $check_attend .= "subject = '{$sub_name}' AND ";
    $check_attend .= "semester= '{$semester}' AND ";
    $check_attend .= "month= '{$month}' AND ";
    $check_attend .= "course = '$course'";
    $check_attend_run = mysqli_query($connection, $check_attend);
    if (!$check_attend_run) die('Query Failed!!'.mysqli_error($connection));
    
    $check_data = mysqli_num_rows($check_attend_run);

    if ($check_data) $error = "Attendance Already Submitted for subject <b>$sub_name</b> of month <b>$month</b>";
    else $show_form ="form";

    mysqli_close($connection);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    <link rel="icon" href="img/favicon.ico">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/add-attend.css">
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
                <h3>Attendance Submition Page</h3>
            </div>
            <div class="attend-form col-1">
                <form action="" method="get">
                    <h3>Please Enter Attendance Details</h3>
                    <?php if (isset($error)) echo '<div class="error"><span class="close-btn" onclick="close_div(this)"></span><p>'.$error.'</p></div>'; ?>
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
                    <input type="number" id="attend_input" name="attend_input" placeholder="Enter total attended classes in this month" max="22" min="1" required><br>
                    <input type="submit" value="Submit" name="submit" id="attend-submit">
                </form>
            </div>
            
            
            
        <?php if(isset($show_form)) { ?> <!-- Hidding Student Div until user select it -->
            
            <div class="stu-details col-1">
                <h3>Students Details</h3>
                <form method="post" class="attend-save">
                    <table align="center">
                        <tr>
                            <th>Roll No</th><th>Name</th><th>Course</th><th>Semester</th><th>Attendance</th><th>Month</th>
                        </tr>

                        <?php

                        if(!empty($course) && !empty($semester) && !empty($month) && !empty($sub_name) && !empty($attend_input) && isset($show_form)){

                            include ("connection.php");

                            $query = " SELECT * FROM students WHERE course='{$course}' AND sem= '{$semester}' " ;
                            $select_query = mysqli_query($connection, $query);

                            checkQuery($select_query);

                            $a=1; // veriable for making chanable input tag name.

                            while($row = mysqli_fetch_array($select_query)) {

                                $db_id =$row['id'];
                                $db_roll_no =$row['roll_no'];
                                $db_first_name =$row['first_name'];
                                $db_last_name =$row['last_name'];
                                $db_name = $db_first_name ." ". $db_last_name ;
                                $db_course =$row['course'];
                        ?>
                        <tr>
                            <td><?php echo $db_roll_no; ?> </td>
                            <td><?php echo $db_name; ?></td>
                            <td><?php echo $db_course; ?></td>
                            <td><?php echo $semester; ?></td>
                            <td><input type="number" name="<?php echo $a; $a++; ?>" placeholder="max (<?php echo $attend_input;?>)" max="<?php echo $attend_input;?>" min="0" value="" required></td>
                            <td><?php echo $month; ?></td>
                        </tr>

                        <?php } //while loop closing  ?> 

                        <?php mysqli_close($connection); } ?>

                    </table>
                    <input type="submit" name="attend_save" id="save_id" value="Submit Details" >
                </form>
            </div>
        <?php } //Hidding Student Form ?>
            
        </div> <!--  /main-content  -->
    </div><!--  /page-content  -->
</body>

<?php 

if(isset($_POST['attend_save'])) {

    if(!empty($course) && !empty($semester) && !empty($month) && !empty($sub_name) && !empty($attend_input) ){

        include ("connection.php");

        $query = " SELECT * FROM students WHERE course='{$course}' AND sem= '{$semester}' " ;
        $select_query = mysqli_query($connection, $query);

        if (!$select_query) die('Query Failed'.mysqli_error($connection));

        $a=1;

        while($row = mysqli_fetch_array($select_query)) {   
            $attendance = $_POST[$a];
            $db_roll_no =$row['roll_no'];
            $db_first_name =$row['first_name'];
            $db_last_name =$row['last_name'];
            $db_course =$row['course'];
            $db_name = $db_first_name ." ". $db_last_name ;

            $query2 = "INSERT INTO std_attend (id,roll_no,name,course,semester,subject,attendance,total_class,month )";
            $query2.= "VALUES ('','$db_roll_no','$db_name','$db_course','$semester','$sub_name','$attendance','$attend_input','$month') ";

            $select_query2 = mysqli_query($connection, $query2);
            $a++;

        }
        mysqli_close($connection);
        echo '<script>myalert("Data has been Submitted Successfully.","info","add_attend.php")</script>'; 
    }
}

?>
</html>
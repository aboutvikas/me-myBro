<?php include("checkUser&functions.php") ?>

<?php

if (isset($_POST['add_sub'])) {
    
    $course_code = $_POST['course_code'];
    $subject_name = $_POST['subject_name'];
    $course = $_POST['course'];
    $sem = $_POST['sem'];
    
    include('connection.php');
    
    $query ="SELECT * FROM subject WHERE course_code = '{$course_code}' ";
    $sub_name_run = mysqli_query($connection,$query);
    
    $result=mysqli_num_rows($sub_name_run);
    
    if ($result) {
        $error ="Subject Already Added";
        mysqli_close($connection);
    } else {
        
        $query ="INSERT INTO subject (id,course_code,subject_name,course,sem) ";
        $query.="VALUES ('','$course_code','$subject_name','$course','$sem')";
                
        $query_check=mysqli_query($connection, $query);
        if(!$query_check) die('Query Failed'.mysqli_error($connection));
        $success_msg="Subject Added Successfully";
        mysqli_close($connection);
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
    <link rel="stylesheet" type="text/css" href="css/add-edit-page.css">
    <link rel="stylesheet" href="font/font-awesome/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="js/modalbox.js"></script>
</head>
<body>
<!-- Side Navigation  -->
    <?php $active_page = "active-subject"; ?> 
    <?php include("side_nav.php"); ?>
<!-- Close Side Navigation   -->
   
    <div class="page-content">
                   
        <?php include("top_nav.php")  ?>
        <!--   Closing Top Nav    -->
        
        <div class="main-content">
            <div class="page-title col-1">
                <h3>Add Subject Page</h3>
            </div>
            <div class="add-sub col-1">
                <div class="edit-form">
                    <form class="sub-form" name="register" action="add_subject.php" method="post">
                    <?php if (isset($error)) echo '<div class="error"><span class="close-btn" onclick="close_div(this)"></span>'.$error.'</div>';  ?>

                    <?php if (isset($success_msg)) echo '<div class="success"><span class="close-btn" onclick="close_div(this)"></span>'.$success_msg.'</div>' ; ?>

                    <h3>Please Enter Subject Details</h3>           
                        <input type="text" name="course_code" placeholder="Course Code" required>
                        <input type="text" name="subject_name" placeholder="Subject Name" required>
                        <select required name="course">
                            <option value="" disabled selected hidden>Course</option>
                            <option value="MCA">MCA</option>
                            <option value="MBA">MBA</option>
                            <option value="BCA">BCA</option>
                            <option value="BBA">BBA</option>
                        </select>
                        <select required name="sem">
                            <option value="" disabled selected hidden>Semester</option>
                            <option value="1">Semester 1</option>
                            <option value="2">Semester 2</option>
                            <option value="3">Semester 3</option>
                            <option value="4">Semester 4</option>
                            <option value="5">Semester 5</option>
                            <option value="6">Semester 6</option>
                        </select>
                        <input type="submit" name="add_sub" value="Add Subject">
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
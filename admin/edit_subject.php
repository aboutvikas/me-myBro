<?php include("checkUser&functions.php") ?>

<?php

if(isset($_POST['edit_subject'])) {
    
    include("connection.php");
    $sub_id = $_GET['edit'];
    
    $course_code = $_POST['course_code'];
    $subject_name = $_POST['subject_name'];
    $course = $_POST['course'];
    $sem = $_POST['sem'];
       
    $query ="SELECT course_code FROM subject WHERE course_code= '{$course_code}' AND id != '{$sub_id}' ";
    $result=mysqli_query($connection,$query);
    checkQuery($result);
    $data=mysqli_num_rows($result);

    if($data){
        $error ="Subject Already Added";
        mysqli_close($connection);
    }
    else {
        $query = "UPDATE subject SET ";
        $query .= "course_code = '{$course_code}', ";
        $query .= "subject_name = '{$subject_name}', ";
        $query .= "course = '{$course}', ";
        $query .= "sem = '{$sem}' ";
        $query .= "WHERE id = '{$sub_id}'";

        $edit_query = mysqli_query ($connection,$query);
        mysqli_close($connection);
        $success_msg="Subject Details Updated Successfully";
    }
}

//for display value in form

if(isset($_GET['edit'])) {

    $sub_id = $_GET['edit'];

    include("connection.php");
    $query = "SELECT * FROM subject WHERE id = '{$sub_id}' ";
    $select_query =  mysqli_query($connection,$query);

    $row = mysqli_fetch_array($select_query);

    $id = $row['id'];
    $course = $row['course'];
    $sem = $row['sem'];
    $course_code = $row['course_code'];
    $subject_name = $row['subject_name'];
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
            <div class="page-title">
                <h3>Update Subject Page</h3>
            </div>
            <div class="edit-subject col-1">
                <div class="edit-form">
                    <form method="post">
                        <h3>Edit Subject Details</h3>
                        <?php if (isset($error)) error_msg($error);?>
                        <?php if (isset($success_msg)) success_msg($success_msg);?>
                        <label>ID</label><input type="number" name="id" value="<?php echo $id; ?>" disabled>
                        <label>Course Code</label><input type="text" name="course_code" value="<?php echo $course_code; ?>">
                        <label>Subject Name</label><input type="text" name="subject_name" value="<?php echo $subject_name; ?>">
                        <label>Course</label>
                        <select name="course">
                            <option value="<?php echo $course; ?>"><?php echo $course; ?></option>
                            <?php changeCourse($course); ?>
                        </select>
                        <label>Semester</label>
                        <select name="sem">
                            <option value="<?php echo $sem; ?>"><?php echo $sem; ?></option>
                            <?php changeSemester($sem); ?>        
                        </select>
                        <input type="submit" name="edit_subject" value="Update">
                    </form>
                </div>
            </div>
        </div>
    </div>  
</body>
</html>
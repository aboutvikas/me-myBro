<?php include("checkUser&functions.php") ?>

<?php

if(isset($_POST['edit_attend'])) {
    
    include("connection.php");
    $user_id = $_GET['edit'];
    $attendance = $_POST['attendance'];
    
    $query = "UPDATE std_attend SET ";
    $query .= "attendance = '{$attendance}' ";
    $query .= "WHERE id = '{$user_id}'";
    
    $edit_query = mysqli_query ($connection,$query);
    checkQuery($edit_query);
    mysqli_close($connection);
    $success_msg="User Details Updated Successfully";
}

//for display value in form

if(isset($_GET['edit'])) {

    include("connection.php");
    $user_id = $_GET['edit'];

    $query = "SELECT * FROM std_attend WHERE id = '{$user_id}' ";
    $select_query =  mysqli_query($connection,$query);

    $row = mysqli_fetch_array($select_query);

    $id = $row['id'];
    $roll_no = $row['roll_no'];
    $name = $row['name'];
    $course = $row['course'];
    $sem = $row['semester'];
    $subject = $row['subject'];
    $db_attendance = $row['attendance'];
    $total_class = $row['total_class'];
    $month = $row['month'];
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
    <?php $active_page = "active-attend"; ?>
    <?php include("side_nav.php"); ?>
<!-- Close Side Navigation   -->
       
    <div class="page-content">
       
        <?php include("top_nav.php")  ?>
        <!--   Closing Top Nav    -->
           
        <div class="main-content">
            <div class="page-title">
                <h3>Update Attendance Page</h3>
            </div>
            <div class="edit-std col-1">
                <div class="edit-form">
                    <form method="post">
                        <h3>Edit Attendance Details</h3>
                        <?php if (isset($success_msg)) success_msg($success_msg);?>
                        <label>ID</label><input type="number" name="id" value="<?php echo $id; ?>" disabled>
                        <label>Roll NO</label><input type="text" name="roll_no" value="<?php echo $roll_no; ?>" disabled>
                        <label>Name</label><input type="text" name="name" value="<?php echo $name; ?>" disabled>
                        <label>Course</label>
                        <select  name="course" disabled>
                            <option value="<?php echo $course; ?>"><?php echo $course; ?></option>
                        </select>
                        <label>Semester</label>
                        <select  name="sem" disabled>
                            <option value="<?php echo $sem; ?>"><?php echo $sem; ?></option>
                        </select>
                        <label>Subject Name</label><input type="text" name="subject" value="<?php echo $subject; ?>" disabled>
                        <label>Attendance</label><input type="number" name="attendance" value="<?php echo $db_attendance; ?>"
                        max="<?php echo $total_class ; ?>" min="0">
                        <label>Total Class</label><input type="number" name="total_class" value="<?php echo $total_class; ?>" disabled>
                        <label>Month</label><input type="text" name="month" value="<?php echo $month; ?>" disabled>
                        <input type="submit" name="edit_attend" value="Update">
                    </form>
                </div>
            </div>
        </div>
    </div>  
</body>
</html>
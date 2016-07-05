<?php include("checkUser&functions.php") ?>

<?php

if(isset($_POST['edit_std'])) {
    
    include("connection.php");
    $user_id = $_GET['edit'];
    
    $fname  = $_POST['fname'];
    $lname = $_POST['lname'];
    $father_name = $_POST['father_name'];
    $roll_no = $_POST['roll_no'];
    $course = $_POST['course'];
    $sem = $_POST['sem'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $gender = $_POST['gender'];
    $city = $_POST['city'];
    $mobile = $_POST['mobile'];
    
    $email = mysqli_real_escape_string($connection,$email);
    $query ="SELECT email FROM students WHERE email= '{$email}' AND id != '{$user_id}' ";
    $result=mysqli_query($connection,$query);
    checkQuery($result);
    $data=mysqli_num_rows($result);

    if($data){
        $error = "Email address already exist.";
        mysqli_close($connection);
    }
    else {
        $query = "UPDATE students SET ";
        $query .= "first_name = '{$fname}', ";
        $query .= "last_name = '{$lname}', ";
        $query .= "father_name = '{$father_name}', ";
        $query .= "roll_no = '{$roll_no}', ";
        $query .= "course = '{$course}', ";
        $query .= "sem = '{$sem}', ";
        $query .= "email = '{$email}', ";
        $query .= "password = '{$pass}', ";
        $query .= "gender = '{$gender}', ";
        $query .= "city = '{$city}', ";
        $query .= "mobile = '{$mobile}' ";
        $query .= "WHERE id = '{$user_id}'";

        $edit_query = mysqli_query ($connection,$query);

        if(!$edit_query) die('Query Failed'.mysqli_error($connection));

        mysqli_close($connection);
        $success_msg="User Details Updated Successfully";
    }
}

//for display value in form

if(isset($_GET['edit'])) {

    include("connection.php");
    $user_id = $_GET['edit'];

    $query = "SELECT * FROM students WHERE id = '{$user_id}' ";
    $select_query =  mysqli_query($connection,$query);

    $row = mysqli_fetch_array($select_query);

    $fname = $row['first_name'];
    $lname = $row['last_name'];
    $father_name = $row['father_name'];
    $roll_no = $row['roll_no'];
    $course = $row['course'];
    $sem = $row['sem'];
    $email = $row['email'];
    $pass = $row['password'];
    $gender = $row['gender'];
    $city = $row['city'];
    $mobile = $row['mobile'];  
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
    <?php $active_page = "active-std"; ?>
    <?php include("side_nav.php"); ?>
<!-- Close Side Navigation   -->
       
    <div class="page-content">
       
        <?php include("top_nav.php")  ?>
        <!--   Closing Top Nav    -->
           
        <div class="main-content">
            <div class="page-title">
                <h3>Update Student Page</h3>
            </div>
            <div class="edit-std col-1">
                <div class="edit-form">
                    <form method="post">
                        <h3>Edit Student</h3>
                        <?php if (isset($error)) error_msg($error);?>
                        <?php if (isset($success_msg)) success_msg($success_msg);?>
                        <label>First Name</label><input type="text" name="fname" value="<?php echo $fname; ?>">
                        <label>Last Name</label><input type="text" name="lname" value="<?php echo $lname; ?>">
                        <label>Father Name</label><input type="text" name="father_name" value="<?php echo $father_name; ?>">
                        <label>AKTU Roll No</label><input type="number" name="roll_no" value="<?php echo $roll_no; ?>">
                        <label>Course</label>
                        <select name="course">
                            <option value="<?php echo $course; ?>"><?php echo $course; ?></option>
                            <?php changeCourse($course); ?>
                        </select>
                        <label>Semester</label>
                        <select  name="sem">
                            <option value="<?php echo $sem; ?>"><?php echo $sem; ?></option>
                            <?php changeSemester($sem); ?>        
                        </select>
                        <label>Email</label><input type="email" name="email" value="<?php echo $email; ?>">
                        <label>Password</label><input type="text" name="pass" value="<?php echo $pass; ?>">
                        <label>Gender</label>
                        <select  name="gender">
                            <option value="<?php echo $gender; ?>"><?php echo $gender; ?></option>
                        <?php 
                            if ($gender == "Female") echo '<option value="Male">Male</option>';
                            else echo '<option value="Female">Female</option>';
                        ?>
                        </select>
                        <label>City</label><input type="text" name="city" value="<?php echo $city; ?>">
                        <label>Mobile Number</label><input type="number" name="mobile" value="<?php echo $mobile; ?>" >
                        <input type="submit" name="edit_std" value="Update">
                    </form>
                </div>
            </div>
        </div>
    </div>  
</body>
</html>
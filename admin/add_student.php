<?php include("checkUser&functions.php") ?>

    
<?php

    if(isset($_POST['submit'])) {
        $error=null;
        $success_msg=null;
        $fname  = $_POST['fname'];
        $lname = $_POST['lname'];
        $father_name = $_POST['father_name'];
        $roll_no = $_POST['roll_no'];
        $course = $_POST['course'];
        $sem = $_POST['sem'];
        $email = $_POST['email'];
        $pass = $_POST['pw'];
        $gender = $_POST['gender'];
        $city = $_POST['city'];
        $mobile = $_POST['mobile'];
        
        if ($_POST['father_name'] == null) {
            
            $father_name = "Not filled by Admin";
        }
        
        if (strlen($pass)<8){
            $error.="Please enter password at least 8 characters.<br>";
        }
        
        if (!$error){
            
            include('connection.php');
            $email = mysqli_real_escape_string($connection,$email);
            $query ="SELECT * FROM students WHERE email= '{$email}' ";
            $result=mysqli_query($connection,$query);
            
            $results=mysqli_num_rows($result);
        
            if($results){
                $error.="Email address already exist. <br>";
                
            } else {
                $query ="INSERT INTO students (id,first_name,last_name,father_name,roll_no,course,sem,email,password,gender,city,mobile) ";
                $query.="VALUES ('','$fname','$lname','$father_name','$roll_no','$course','$sem','$email','$pass','$gender','$city','$mobile')";
                
                $query_check=mysqli_query($connection, $query);
                if(!$query_check){
                    die('Query Failed'.mysqli_error($connection));
                }

                $success_msg="New Student Added Successfully";

            }
            
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
    <?php $active_page = "active-std"; ?> 
    <?php include("side_nav.php"); ?>
<!-- Close Side Navigation   -->
   
    <div class="page-content">
                   
        <?php include("top_nav.php")  ?>
        <!--   Closing Top Nav    -->
        
        <div class="main-content">
            <div class="page-title col-1">
                <h3>Add Student</h3>
            </div>
            <div class="add-std col-1">
                <div class="edit-form">
                    <?php if (isset($error)) echo '<div class="error"><span class="close-btn" onclick="close_div(this)"></span>'.$error.'</div>';  ?>

                    <?php if (isset($success_msg)) echo '<div class="success"><span class="close-btn" onclick="close_div(this)"></span>'.$success_msg.'</div>' ; ?>

                    <h3>Enter New Student Details</h3>           
                    <form name="register" action="add_student.php" method="post">
                        <label>First Name</label><input type="text" name="fname" placeholder="First Name" required>
                        <label>Last Name</label><input type="text" name="lname"  placeholder="Last Name">
                        <label>Father Name</label><input type="text" name="father_name" placeholder="Father's Name">
                        <label>AKTU Roll No</label><input type="number" name="roll_no" placeholder="AKTU Roll No" required>
                        <label>Course</label>
                        <select required name="course">
                            <option value="" disabled selected hidden>Course</option>
                            <option value="MCA">MCA</option>
                            <option value="MBA">MBA</option>
                            <option value="BCA">BCA</option>
                            <option value="BBA">BBA</option>
                        </select>
                        <label>Semester</label>
                        <select required name="sem">
                            <option value="" disabled selected hidden>Semester</option>
                            <option value="1">Semester 1</option>
                            <option value="2">Semester 2</option>
                            <option value="3">Semester 3</option>
                            <option value="4">Semester 4</option>
                            <option value="5">Semester 5</option>
                            <option value="6">Semester 6</option>
                        </select>
                        <label>Email</label><input type="email" name="email" placeholder="Email" required>
                        <label>Password</label><input type="password" name="pw" placeholder="Password" required>
                        <label>Gender</label>
                        <select required name="gender">
                            <option value="" hidden="hidden" disabled selected>Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                        <label>City</label><input type="text" name="city" placeholder="City">
                        <label>Mobile Number</label><input type="number" name="mobile" placeholder="Mobile Number" maxlength="10" required>
                        <input type="submit" name="submit" value="Add Student">
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
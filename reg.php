<?php session_start(); ?>
    
<?php

    if(isset($_POST['submit']) == "Register") {
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
        $cpass= $_POST['cpw'];
        
        if ($_POST['father_name'] == null) {
            
            $father_name = "Not filled by user";
        }
        
        if ($pass !== $cpass){
            $error.="Password and Confirm Password doesn't match.<br>";
        }
        if (strlen($pass)<8){
            $error.="Please enter password at least 8 characters.<br>";
        }
        // encrypting password
        
        //   $pass = md5(md5("i am adding some letters to password".$pass));
        
        
        if (!$error){
            
            include('connection.php');
            $email = mysqli_real_escape_string($connection,$email);
            
            $query ="SELECT email FROM students WHERE email= '{$email}' ";
            $result=mysqli_query($connection,$query);
            
            $results=mysqli_num_rows($result);
        
            if($results) {
                $error.="Email address already exist. <br>";
                
            } else {
                $query ="INSERT INTO students (id,first_name,last_name,father_name,roll_no,course,sem,email,password,gender,city,mobile) "; 
                $query.="VALUES ('','$fname','$lname','$father_name','$roll_no','$course','$sem','$email','$pass','$gender','$city','$mobile')";

                $query_check=mysqli_query($connection, $query);

                $success_msg="You have successfully registered";
            }
            
            mysqli_close($connection);
        }

    }

include ("login.php");

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome To RSMT</title>
    <link rel="icon" href="img/favicon.ico">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/header_footer.css">
    <link rel="stylesheet" type="text/css" href="css/reg.css">
    <link rel="stylesheet" type="text/css" href="css/animation.css">
    <link rel="stylesheet" type="text/css" href="css/responsive.css">
    <script type="text/javascript" src="js/modalbox.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<!-----------------------  Header -------------------->
<?php $active_page ='register'; ?>

<?php include ("header.php"); ?>

<!-----------------------  /Header ------------------->
    <section>
        <div class="container flex-col">
            <div class="reg-heading col-4">
                <h2>Why Should I Register ?</h2><hr>
                <ul>
                    <li>To Submit Application Form Online</li>
                    <li>To Make Fee Payment Online</li>
                    <li>To Check Your Submmited Details</li>
                    <li>To Get Ricept & Notifications</li>
                    <li>To Check Attendance Details</li>
                    <li>To Check Internal Exam Result</li>
                </ul>
                <h2>Need Help ?</h2><hr>
               <ul class="reg-contact">
                   <li><b>Call Us :</b> +91 542-2108316</li>
                   <li><b>Email Us :</b><a href="mailto:rsmat.ac.in@gmail.com"> rsmt.ac.in@gmail.com</a></li>
               </ul>
            </div>
            <div class="reg col-5">
              
               <?php if (isset($error)) echo '<div class="error"><span class="close-btn" onclick="close_div(this)"></span><p style="margin:0;">'.$error.'</p></div>';  ?>
               
               <?php if (isset($success_msg)) echo '<div class="success"><span class="close-btn" onclick="close_div(this)"></span>'.$success_msg.'</div>' ; ?>
               
               <h3>New Student Registration</h3>
                <form name="register" action="reg.php" method="post">
                    <input type="text" name="fname" id="fname" placeholder="First Name" required>
                    <input type="text" name="lname" id="lname" placeholder="Last Name">
                    <input type="text" name="father_name" id="father_name" placeholder="Father's Name">
                    <input type="number" name="roll_no" id="roll_no" placeholder="AKTU Roll No" required>
                    <select required name="course">
                        <option value="" disabled selected hidden><span class="doo">Course</span></option>
                        <option value="MCA">MCA</option>
                        <option value="MBA">MBA</option>
                        <option value="BCA">BCA</option>
                        <option value="BBA">BBA</option>
                    </select>
                    <select required name="sem">
                        <option value="" disabled selected hidden><span class="doo">Semester</span></option>
                        <option value="1">Semester 1</option>
                        <option value="2">Semester 2</option>
                        <option value="3">Semester 3</option>
                        <option value="4">Semester 4</option>
                        <option value="5">Semester 5</option>
                        <option value="6">Semester 6</option>
                    </select>
                    <input type="email" name="email" id="email" placeholder="Email" required>
                    <input type="password" name="pw" id="pw" placeholder="Password" required>
                    <input type="password" name="cpw" id="cpw" placeholder="Confirm Password" required>
                    <select required name="gender">
                        <option class="do" value="" hidden="hidden" disabled selected>Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                    <input type="text" name="city" id="city" placeholder="City">
                    <input type="number" name="mobile" id="mobile" placeholder="Mobile Number" maxlength="10" required>
                    <input type="checkbox" name="term" id="term" class="checkbox" required>
                    <label for="term">I have read and agree to the Terms.</label>
                    <input type="submit" name="submit" id="submit" value="Register">
                </form>
            </div>
        </div>
    </section>
<!--Footer Start Here-->

<?php include("footer.php"); ?>

<!--/Close Footer-->
</body>
</html>
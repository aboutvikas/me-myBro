<?php include("checkUser&functions.php") ?>
<?php include("delete.php") ?>

<!-- calling deleteStudent function -->
<?php  deleteStudent(); ?>


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
    <?php $active_page = "active-std"; ?>
    <?php include("side_nav.php"); ?>
<!-- Close Side Navigation   -->
       
    <div class="page-content">
       
        <?php include("top_nav.php")  ?>
        <!--   Closing Top Nav    -->
           
        <div class="main-content">
            <div class="page-title">
                <h3>Student</h3>
            </div>
            <div class="view-form">
                <form name="register" action="view_student.php" method="get">               
                    <h3>Enter Student Details</h3>           
                    <select required name="course">
                        <option value="" disabled selected hidden>Course</option>
                        <option value="MCA">MCA</option>
                        <option value="MBA">MBA</option>
                        <option value="BCA">BCA</option>
                        <option value="BBA">BBA</option>
                    </select>
                    <select name="sem">
                        <option value="" disabled selected hidden>Semester</option>
                        <option value="1">Semester 1</option>
                        <option value="2">Semester 2</option>
                        <option value="3">Semester 3</option>
                        <option value="4">Semester 4</option>
                        <option value="5">Semester 5</option>
                        <option value="6">Semester 6</option>
                    </select>
                    <input type="submit" name="view_std" value="Submit">
                    <em>-or-</em>
                </form>
                <form method="get">
                    <input class="btn btn-lg btn-default" type="submit" name="view_all_std" value="View All">
                </form>
            </div>
            
            <?php 
    
            if (isset($_GET['view_std']) || isset($_GET['view_all_std'])) {
                
                $course = @$_GET['course'];
                $sem = @$_GET['sem'];
                $view_all = @$_GET['view_all_std'];
                
            ?>
            
            <div class="std-table">
                <div class="view-table">
                    <h4><?php if(isset($course)) echo $course.' '.$sem; else echo "ALL"; ?> Students</h4>
                    <table align="center">
                        <tr>
                            <th>Roll No</th>
                            <th>Name</th>
                            <th>Father Name</th>
                            <th>Course</th>
                            <th>Sem</th>
                            <th>Gender</th>
                            <th>Email Address</th>
    <!--                        <th>Password</th>-->
                            <th>City</th>
                            <th>Mobile</th>
                            <th>Update</th>
                            <th>Delete</th>
                        </tr>

                           <?php 

                           include("connection.php");

                           if ($view_all == "View All") $query =" SELECT * FROM students";

                           else if ($course && !$sem) { 
                               $query =" SELECT * FROM students WHERE course = '{$course}'";
                           }else if( $course && $sem ){
                               $query =" SELECT * FROM students WHERE course = '{$course}' AND sem = '{$sem}' ";
                           }

                           $select_query = mysqli_query($connection,$query);

                           if(!$select_query){
                               die('Query Failed'.mysqli_error($connection));
                           }

                           while($row = mysqli_fetch_array($select_query)) {

                               $id =$row['id'];
                               $roll_no =$row['roll_no'];
                               $first_name =$row['first_name'];
                               $last_name =$row['last_name'];
                               $name = $first_name ." ". $last_name ;
                               $father_name =$row['father_name'];
                               $course =$row['course'];
                               $sem =$row['sem'];
                               $gender = $row['gender'];
                               $email = $row['email'];
                               //$pass = $row['password'];
                               $city = $row['city'];
                               $mobile = $row['mobile'];
                           ?>
                        <tr>
                            <td><?php echo $roll_no; ?></td>
                            <td><?php echo $name; ?></td>
                            <td><?php echo $father_name; ?></td>
                            <td><?php echo $course; ?></td>
                            <td><?php echo $sem; ?></td>
                            <td><?php echo $gender; ?></td>
                            <td><?php echo $email; ?></td>
<!--                            <td><?php //echo $pass; ?></td>-->
                            <td><?php echo $city; ?></td>
                            <td><?php echo $mobile; ?></td>

                            <td><a href="edit_std.php?edit=<?php echo $id?>"><button class="btn btn-sm btn-default"><i class="fa fa-pencil"></i></button></a></td>

                            <td><button class="btn btn-sm btn-danger" onclick="myconfirm ('Are you sure that you want to permanently delete <br><b><?php echo $name; ?></b>', 'view_student.php?delete=<?php echo $id?>')"><i class="fa fa-trash"></i></button></td>
                        </tr>

                        <?php
                            } //while loop
                            mysqli_close($connection);
                        ?>

                    </table>
                </div>
            </div>
            
            <?php } // close hidden div ?>
        </div>
    </div>
         
</body>
</html>
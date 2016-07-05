<?php include("checkUser&functions.php") ?>
<?php include("delete.php") ?>

<!-- calling deleteSubject function -->
<?php  deleteSubject(); ?>


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
    <?php $active_page = "active-subject"; ?>
    <?php include("side_nav.php"); ?>
<!-- Close Side Navigation   -->
       
    <div class="page-content">
       
        <?php include("top_nav.php")  ?>
        <!--   Closing Top Nav    -->
           
        <div class="main-content">
            <div class="page-title">
                <h3>View Subject Page</h3>
            </div>
            <div class="view-form">
                <form name="register" action="view_subject.php" method="get">               
                    <h3>Enter Subject Details</h3>           
                    <select required name="course">
                        <option value="" disabled selected hidden>Course</option>
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
                    <input type="submit" name="view_sub" value="Submit">
                    <em>-or-</em>
                </form>
                <form method="get">
                    <input class="btn btn-lg btn-default" type="submit" name="view_all_sub" value="View All">
                </form>
            </div>
            
            <?php 
    
            if (isset($_GET['view_sub']) || isset($_GET['view_all_sub'])) {
                
                $course = @$_GET['course'];
                $sem = @$_GET['sem'];
                $view_all = @$_GET['view_all_sub'];
                
            ?>
            <div class="std-table">
                <div class="view-table">
                    <h4> <?php if(isset($course)) echo $course.' '.$sem.' Semester'; else echo "ALL"; ?> Subjects</h4>
                    <table align="center">
                        <tr>
                            <th>ID</th>
                            <th>Course Code</th>
                            <th>Subject Name</th>
                            <th>Course</th>
                            <th>Semester</th>
                            <th>Update</th>
                            <th>Delete</th>
                        </tr>

                           <?php 

                           include("connection.php");

                           if ($view_all == "View All") $query =" SELECT * FROM subject";

                           else $query =" SELECT * FROM subject WHERE course = '{$course}' AND sem = '{$sem}' ";

                           $select_query = mysqli_query($connection,$query);

                           if(!$select_query) die('Query Failed'.mysqli_error($connection));

                           while($row = mysqli_fetch_array($select_query)) {

                               $id =$row['id'];
                               $course_code =$row['course_code'];
                               $subject_name =$row['subject_name'];
                               $course =$row['course'];
                               $sem =$row['sem'];
                           ?>
                        <tr>
                            <td><?php echo $id; ?></td>
                            <td><?php echo $course_code; ?></td>
                            <td><?php echo $subject_name; ?></td>
                            <td><?php echo $course; ?></td>
                            <td><?php echo $sem; ?></td>

                            <td><a href="edit_subject.php?edit=<?php echo $id?>"><button class="btn btn-sm btn-default"><i class="fa fa-pencil"></i></button></a></td>

                            <td><button class="btn btn-sm btn-danger" onclick="myconfirm ('You are about to permanently delete this subject <br><b><?php echo $subject_name; ?></b>', 'view_subject.php?delete=<?php echo $id?>')"><i class="fa fa-trash"></i></button></td>
                        </tr>

                        <?php } 
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
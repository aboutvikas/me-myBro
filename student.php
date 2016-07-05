<?php
    session_start();
    if(!isset($_SESSION['check_user'])) {
        header("Location:index.php");
    }
?>
        
<?php
    include("connection.php");
    $query = "SELECT * FROM students WHERE id = '{$_SESSION['check_user']}' ";
    $select_query =  mysqli_query($connection,$query);

    $row = mysqli_fetch_array($select_query);

    $fname = $row['first_name'];
    $lname = $row['last_name'];
    $father_name = $row['father_name'];
    $roll_no = $row['roll_no'];
    $course = $row['course'];
    $email = $row['email'];
    $gender = $row['gender'];
    $city = $row['city'];
    $mobile = $row['mobile'];
    
    mysqli_close($connection);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome To RSMT</title>
    <link rel="icon" href="img/favicon.ico">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/header_footer.css">
    <link rel="stylesheet" type="text/css" href="css/student.css">
    <link rel="stylesheet" type="text/css" href="css/responsive.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="js/modalbox.js"></script>
</head>
<body>
    <!-------------------------  Header -------------------->
    <?php $active_page ='student'; ?>
    <?php include ("header.php"); ?>
    <!-- /Header  -->
<section>
    <div class="container">
        <div class="stu-welcome col-1">
            <h2>Welcome <?php echo $fname; ?></h2>
        </div>
        <div class="stu-details col-1">
            <h3 align="center">Your Details</h3>
            <table align="center">
                <tr>
                    <td>Name</td><td><?php echo $fname.' '.$lname; ?></td>
                </tr>
                <tr>
                    <td>Father's Name</td><td><?php echo $father_name; ?></td>
                </tr>
                <tr>
                    <td>Roll No</td><td><?php echo $roll_no; ?></td>
                </tr>
                <tr>
                    <td>Couser</td><td><?php echo $course; ?></td>
                </tr>
                <tr>
                    <td>Email</td><td><?php echo $email; ?></td>
                </tr>
                <tr>
                    <td>Gender</td><td><?php echo $gender; ?></td>
                </tr>
                <tr>
                    <td>City</td><td><?php echo $city; ?></td>
                </tr>
                <tr>
                    <td>Mobile No</td><td><?php echo $mobile; ?></td>
                </tr>
            </table>
        </div>
    </div>
</section>
<!--Footer Start -->

<?php include("footer.php"); ?>

<!--/Close Footer-->
</body>
</html>
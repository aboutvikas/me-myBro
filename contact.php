<?php session_start(); 

include("login.php");

?>

<?php 
if(isset($_POST['send'])) {
    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    
    if ($name != NULL && $email != NULL && $subject != Null && $message != NULL) {
        
        include("connection.php");
        
        $query = "INSERT INTO user_contact (id,name,email,subject,message)";
        $query.= "VALUES ('', '$name', '$email', '$subject', '$message')" ;
        
        $select_query = mysqli_query($connection,$query);
        
        if (!$select_query) {
            die("Query FAILED!!".mysqli_error($connection));
        } else {
            echo '<script> alert("Your request has been submitted successfully"); </script>';
        }
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome To RSMT</title>
    <link rel="icon" href="img/favicon.ico">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/header_footer.css">
    <link rel="stylesheet" type="text/css" href="css/contact.css">
    <link rel="stylesheet" media="screen" href="css/animation.css">
    <link rel="stylesheet" media="screen" href="css/responsive.css">
    <script type="text/javascript" src="js/modalbox.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<!-----------------------  Header -------------------->
<?php $active_page ='contact'; ?>

<?php include ("header.php"); ?>

<!-----------------------  /Header ------------------->


<!-------------------- Section ----------------------->
<section>
    <div class="container">
        <div class="heading col-1">
            <div class="heading-location">
                <h1>Contact Us</h1>
            </div>
        </div>
    </div>
    <div class="container flex-col">   
        <div class="address col-3">
            <h2>Our Address</h2>
            <div>
                <p>Rajarshi School of Management & Technology<br>
                Udai Pratap College Campus<br>Varanasi-221002 UP,INDIA<br></p>
                <h3>Phone Number :</h3>
                <p>+91-542-2108316</p>
                <p>+91-542-2280641</p>
                <h3>Email :</h3>
                <p class="email"><a href="mailto:rsmt.ac.in@gmail.com">rsmt.ac.in@gmail.com</a></p>
                <p class="email"><a href="mailto:placementrsmt@gmail.com">placementrsmt@gmail.com</a></p>
            </div>
        </div>
        <div class="widget col-2">
            <h2>Contact Us</h2>
            <div class="contact-form">
                <form action="" method="post">
                    <input type="text" placeholder="Your Name" id="name" name="name" required>
                    <input type="email" placeholder="Your Email" id="email" name="email" required>
                    <input type="text" placeholder="Subject" id="subject" name="subject" required>
                    <textarea id="message" placeholder="Your Massage" cols="40" rows="3" name="message" required></textarea>
                    <input type="submit" id="send" value="Send" name="send">
                </form>
            </div>
        </div>
    </div>
</section>
<!--Footer Start -->

<?php include("footer.php"); ?>

<!--/Close Footer-->
</body>
</html>
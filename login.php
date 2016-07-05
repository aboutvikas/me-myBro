<?php

if (isset($_POST['login']) == "Submit" ){
    include("connection.php");
    
    $email =$_POST['email'];
    $pass =$_POST['pass'];
    
    $email = mysqli_real_escape_string($connection,$email);
    $pass = mysqli_real_escape_string($connection,$pass);
    
    // encriptin password to verify password
    //  $pass = md5(md5("i am adding some letters to password".$pass));
    
    $query = "SELECT email FROM students WHERE email = '{$email}' ";
    $select_query =  mysqli_query($connection,$query);
    
    if(!$select_query) die("Query Failed !!".mysqli_error($connection));
    
    $row = mysqli_fetch_array($select_query);
    //print_r ($row);
    $db_email =$row['email'];
    
    if ($email === $db_email) {
        
        $query = "SELECT * FROM students WHERE email = '{$email}' ";
        $select_query =  mysqli_query($connection,$query);
        $row = mysqli_fetch_array($select_query);
        
        $db_id =$row['id'];
        $db_password =$row['password'];
        
        if ($email === $db_email && $pass === $db_password ) {
            $_SESSION['check_user']= $db_id;
            header("Location:student.php");
            mysqli_close($connection);
            
        }else {
            $login_error = "The e-mail address or password you entered was incorrect.";
            mysqli_close($connection);
        }
        
    }else {
        $login_error = "Your email address is not register.Please check your email address.";
        mysqli_close($connection);
    }
}

?>
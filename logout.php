<?php 

    session_start(); 
    $_SESSION['check_user'] = null; 
    header("Location: index.php");
//    session_destroy();

?>
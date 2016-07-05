<?php

    session_start(); 
    if(!isset($_SESSION['user_id'])) {
        header("Location:index.php");
    }

    $_SESSION['user_id'] = null; 
    session_destroy();
    header("Location: index.php");

?>
<?php
//if(!isset($_SESSION['user_id'])) {
//    header("Location:index.php");
//}
?>
<?php

    $servername="localhost";
    $username="root";
    $password="";
    $dbname="rsmt";

    $connection=mysqli_connect($servername, $username, $password, $dbname);
    if(mysqli_connect_error()){
        die("Database connetion Failed!!");
    }

?>
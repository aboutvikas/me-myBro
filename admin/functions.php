<?php
if(!isset($_SESSION['user_id'])) {
    header("Location:index.php");
}

function checkQuery($query) {

    include("connection.php");
    if(!$query) {
        die('Query Failed!!'.mysqli_error($connection));
        mysqli_close($connection);
    }
    mysqli_close($connection);
}


// get subject from db according to course and sem
function subject_name() {
    if (isset($_GET['change_sub'])) {

        $course = $_GET['course'] ;
        $sem = $_GET['sem'] ;

        include("connection.php");
        $opt_query = "SELECT subject_name FROM subject WHERE course = '{$course}' AND sem = '{$sem}' ";

        $opt_query_run = mysqli_query($connection,$opt_query);

        while($row = mysqli_fetch_array($opt_query_run)) {
            $subject_name = $row['subject_name'];
            echo '<option value="'.$subject_name.'" >'.$subject_name.'</option>';
        }
        mysqli_close($connection);
    }
}


function countRow($sql) {
    include ("connection.php");
    $count_query = $sql;
    $count_query_run = mysqli_query($connection,$count_query);
    $total_row = mysqli_num_rows($count_query_run);
    mysqli_close($connection);
    return $total_row;
}

function changeSemester($sem) {

    switch ($sem) {
        case "1":
            echo '<option value="2">2</option>';
            echo '<option value="3">3</option>';
            echo '<option value="4">4</option>';
            echo '<option value="5">5</option>';
            echo '<option value="6">6</option>';
            break;

        case "2":
            echo '<option value="1">1</option>';
            echo '<option value="3">3</option>';
            echo '<option value="4">4</option>';
            echo '<option value="5">5</option>';
            echo '<option value="6">6</option>';
            break;

        case "3":
            echo '<option value="1">1</option>';
            echo '<option value="2">2</option>';
            echo '<option value="4">4</option>';
            echo '<option value="5">5</option>';
            echo '<option value="6">6</option>';
            break;

        case "4" :
            echo '<option value="1">1</option>';
            echo '<option value="2">2</option>';
            echo '<option value="3">3</option>';
            echo '<option value="5">5</option>';
            echo '<option value="6">6</option>';
            break;

        case "5" :
            echo '<option value="1">1</option>';
            echo '<option value="2">2</option>';
            echo '<option value="3">3</option>';
            echo '<option value="4">4</option>';
            echo '<option value="6">6</option>';
            break;

        case "6" :
            echo '<option value="1">1</option>';
            echo '<option value="2">2</option>';
            echo '<option value="3">3</option>';
            echo '<option value="4">4</option>';
            echo '<option value="5">5</option>';
            break;
    }
}

function changeCourse($course) {

    switch ($course) {
        case "MCA":
            echo '<option value="MBA">MBA</option>';
            echo '<option value="BCA">BCA</option>';
            echo '<option value="BBA">BBA</option>';
            break;
        case "MBA":
            echo '<option value="MCA">MCA</option>';
            echo '<option value="BCA">BCA</option>';
            echo '<option value="BBA">BBA</option>';
            break;
        case "BCA":
            echo '<option value="MCA">MCA</option>';
            echo '<option value="MBA">MBA</option>';
            echo '<option value="BBA">BBA</option>';
            break;
        case "BBA" :
            echo '<option value="MCA">MCA</option>';
            echo '<option value="MBA">MBA</option>';
            echo '<option value="BCA">BCA</option>';
            break;
    }
}

//percentage Calculator
function percentageCalc($value, $total) {

    $result = ($value/$total)*100;
    $result = floor($result);
    return $result;
}

function getImageExtension($imagetype) {
    
    if(empty($imagetype)) return false;
    
    switch($imagetype) {

        case 'image/bmp': return '.bmp';

        case 'image/gif': return '.gif';

        case 'image/jpeg': return '.jpg';

        case 'image/png': return '.png';

        default: return false;
    }
}

function error_msg($error) {
    if (isset($error)) echo '<div class="error"><span class="close-btn" onclick="close_div(this)"></span>'.$error.'</div>';
}

function success_msg($success_msg) {
    if (isset($success_msg)) echo '<div class="success"><span class="close-btn" onclick="close_div(this)"></span>'.$success_msg.'</div>';
}

function resizeImage($maxDim) {
    list($width, $height) = getimagesize( $_FILES['user_img']['tmp_name'] );
    if ( $width > $maxDim || $height > $maxDim ) {
        $target_filename = $_FILES['user_img']['tmp_name'];
        $fn = $_FILES['user_img']['tmp_name'];
        $size = getimagesize( $fn );
        $ratio = $size[0]/$size[1]; // width/height
        if( $ratio > 1) {
            $width = $maxDim;
            $height = $maxDim/$ratio;
        } else {
            $width = $maxDim*$ratio;
            $height = $maxDim;
        }
        $src = imagecreatefromstring( file_get_contents( $fn ) );
        $dst = imagecreatetruecolor( $width, $height );
        imagecopyresampled( $dst, $src, 0, 0, 0, 0, $width, $height, $size[0], $size[1] );
        imagepng( $dst, $target_filename ); // adjust format as needed
        imagedestroy( $src );
        imagedestroy( $dst );
    }
}

?>
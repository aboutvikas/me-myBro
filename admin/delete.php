<?php
if(!isset($_SESSION['user_id'])) {
    header("Location:index.php");
}
?>

<?php 
if(!isset($_SESSION['user_id'])) {
    header("Location:index.php");
}

function deleteStudent() {
    if(isset($_GET['delete'])){
        if (isset($_SESSION['user_id'])) {
            include("connection.php");

            $user_id = $_GET['delete'];
            $user_id = mysqli_real_escape_string($connection,$user_id);

            $query =" DELETE FROM students WHERE id='$user_id' ";
            $delete_query = mysqli_query($connection,$query);
            mysqli_close($connection);
            header("Location:view_student.php");
        }
    }
}

function deleteAttendance() {
    if(isset($_GET['delete'])){
        include("connection.php");

        $user_id = $_GET['delete'];

        $query =" DELETE FROM std_attend WHERE id='$user_id' ";
        $delete_query = mysqli_query($connection,$query);
        mysqli_close($connection);
        header("Location:view_attend.php");
    }
}

function deleteSubject() {
    if(isset($_GET['delete'])){
        include("connection.php");

        $user_id = $_GET['delete'];

        $query =" DELETE FROM subject WHERE id='$user_id' ";
        $delete_query = mysqli_query($connection,$query);
        mysqli_close($connection);
        header("Location:view_subject.php");
    }
}

function deleteAdminUser() {
    if(isset($_GET['delete'])){
        include("connection.php");

        $user_id = $_GET['delete'];

        $query =" DELETE FROM admin_user WHERE id='$user_id' ";
        $delete_query = mysqli_query($connection,$query);
        mysqli_close($connection);
        header("Location:view_users.php");
    }
}

?>
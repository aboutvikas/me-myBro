<?php
if(!isset($_SESSION['user_id'])) {
    header("Location:index.php");
}
?>
<!-- including side-nav.css -->
<link rel="stylesheet" href="css/side-nav.css">

<!-- Side-nav Dropdwon Javascript -->
<script>
    function show_dropdown(id) {
        id = document.getElementById(id);
            
        if(id.classList.contains("show_dd")) {
            id.classList.toggle("hide_dd");
        }
        else {
            id.classList.remove("hide_dd");
        }
        
        id.classList.toggle("show_dd");
    }
    
    function show_nav() {
        var nav = document.getElementsByTagName("nav")[0];
        nav.classList.toggle("show_nav");
    }
</script>

<?php if (!isset($active_page)) $active_page=""; ?>

<header>
    <nav>
    <div class="side-nav">
        <div class="logo">
            <a href="dashboard.php">Adminstrator</a>
            <button class="close-nav-btn" onclick="show_nav();"></button>
        </div>
        <ul>
            <li><a class="<?php if($active_page == "dashboard") echo "active"; ?>" href="dashboard.php"><i class="fa fa-dashboard" ></i>Dashboard</a></li>
            <li>
                <a class="<?php if($active_page == "active-std") echo "active"; ?>" onclick="show_dropdown('d1');"><i class="fa fa-users"></i>Students<span class="icon-arrow"></span></a>
                <ul class="dropdown" id="d1">
                    <!-- d1 stands for Dropdown 1 -->
                    <li><a href="add_student.php"><i class="fa fa-user-plus" ></i>Add Student</a></li>
                    <li><a href="view_student.php"><i class="fa fa-users" ></i>View Students</a></li>
                </ul>
            </li>
            <li>
                <a class="<?php if($active_page == "active-attend") echo "active";?>" onclick="show_dropdown('d2');"><i class="fa fa-file-text-o"></i>Attendance<i class="icon-arrow"></i></a>
                <ul class="dropdown" id="d2">
                    <li><a href="add_attend.php"><i class="fa fa-plus-circle"></i>Add Attendance</a></li>
                    <li><a href="view_attend.php"><i class="fa fa-table"></i>View Attendence</a></li>
                </ul>
            </li>
            <li>
                <a class="<?php if($active_page == "active-subject") echo "active";?>" onclick="show_dropdown('d3')"><i class="fa fa-book"></i>Subject<i class="icon-arrow"></i></a>
                <ul class="dropdown" id="d3">
                    <li><a href="add_subject.php"><i class="fa fa-plus-circle"></i>Add Subject</a></li>
                    <li><a href="view_subject.php"><i class="fa fa-table"></i>View Subject</a></li>
                </ul>
            </li>
            <li><a href="../index.php" target="_blank"><i class="fa fa-university" ></i>College Website</a></li>
            <li><a href="#"><i class="fa fa-info-circle" ></i>About Us</a></li>
        </ul>
    </div>
    </nav>
</header>
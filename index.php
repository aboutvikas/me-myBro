<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome To RSMT</title>
    <link rel="icon" href="img/favicon.ico">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/header_footer.css">
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <link rel="stylesheet" type="text/css" href="css/animation.css">
    <link rel="stylesheet" media="screen" href="css/responsive.css">
    <script type="text/javascript" src="js/myalert&myconfirm.js"></script>
    <script type="text/javascript" src="js/modalbox.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>   
<body>
<!-----------------------  Header -------------------->

<?php 
    $active_page ='index';
    include("login.php");
?>
<?php include ("header.php"); ?>

<!-----------------------  /Header ------------------->
    <section>   
        <div class="container">
            <div class="row flex-col clearfix">
                <div class="gallery col-2">
<!--                    <div class="">-->
<!--                        <div class="img-msg">Hello this is msg</div>-->
                        <img src="img/1.jpg" class="gal-img" id="gal_img" />
<!--                    </div>-->
                    
                    <img src="img/2.jpg" class="gal-img" id="gal_img" />
                    <img src="img/3.jpg" class="gal-img" id="gal_img" />
                    <img src="img/4.jpg" class="gal-img" id="gal_img" />
                </div>
                
<!------------------- Latest News ----------------->
                
                <div class="latest-news col-3">
                    <div class="news-heading">  
                        <h4>LATEST NEWS</h4><hr>
                    </div>
                    <div class="news">
                        <div class="news-calender clearfix">
                            <span class="month">Jan</span>
                            <span class="date">03</span>
                        </div>
                        <div class="news-details">
                            <p>BCA/BBA Entrance Examination Result 2015-16</p>
                        </div>
                    </div>
                    <div class="news">
                        <div class="news-calender clearfix">
                            <span class="month">Feb</span>
                            <span class="date">19</span>
                        </div>
                        <div class="news-details">
                            <p>MCA/MBA Entrance Examination Result 2015-16</p>
                        </div>
                    </div>
                    <div class="news">
                        <div class="news-calender clearfix">
                            <span class="month">Jul</span>
                            <span class="date">10</span>
                        </div>
                        <div class="news-details">
                            <p>Udai Pratap Inter College Entrance Examination Result</p>
                        </div>
                    </div>
                    <div class="news">
                        <div class="news-calender clearfix">
                            <span class="month">Aug</span>
                            <span class="date">14</span>
                        </div>
                        <div class="news-details">
                            <p>Regarding Dates of UPSEE 2016 Exam.More details on AKTU</p>
                        </div>
                    </div>
                    <div class="news">
                        <div class="news-calender clearfix">
                            <span class="month">Sep</span>
                            <span class="date">30</span>
                        </div>
                        <div class="news-details">
                            <p>BCA/BBA Entrance Examination Result 2015-16</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="index-content">
             <div class="col-2">
             
<!---------------------  Welcome Message  ------------------------>
                <div class="widget-item">
                    <h2>Welcome to RSMT</h2>
                    <p>
                        Rajarshi School of Management & Technology is a leading technology institute offering under-graduate and post-graduate programmes in Computer Application and Management. 
                    </p>
                    <p>
                        Globally there is a turning towards India for guidance with the realization that a clinically scientific approach even when softened by application of human psychology, falls short of developing fully rounded human beings. Ancient Indian education methodologies nurtured each individual holistically simultaneously addressing aspects that can be measured, those that can be surmised, and intangibles that exist beyond the measureable. RSMT approach reflects this tradition, constantly striving for goals that surpass the predictable and logically achievable. This approach guarantees fruition of the highest potential of each student and faculty member.
                    </p>
                    <p>A non-profit institution, RSMT reinvests its surplus to constantly upgrade infrastructure and facilities to promote an environment of learning.</p>
                    <p>
                        Ideally located in Varanasi, the City of Light, which for millennia has been the center of intellectual excellence, RSMT aims to integrate this eternal brilliance into modern Management.<a href="">Read more ></a>
                    </p>
                </div>
                
                
<!-----------------------------  Course ------------------------>
                
                 <div class="courses">
                     <div><h3>Courses</h3><hr></div>
                     <div class="course-list">
                        <ul class="course-list-item">
                            <li class="course-name">
                                <div class="course-heading">MCA</div>
                                <div class="course-duration"><b>Duration:</b> 3 Years</div>
                                <div class="course-price">Rs 45000/Year</div>
                            </li>
                            <li class="course-name">
                                <div class="course-heading">MBA</div>
                                <div class="course-duration"><b>Duration:</b> 2 Years</div>
                                <div class="course-price">Rs 46000/Year</div>
                            </li>
                            <li class="course-name">
                                <div class="course-heading">BCA</div>
                                <div class="course-duration"><b>Duration:</b> 3 Years</div>
                                <div class="course-price">Rs 32000/Year</div>
                            </li>
                            <li class="course-name">
                                <div class="course-heading">BBA</div>
                                <div class="course-duration"><b>Duration:</b> 3 Years</div>
                                <div class="course-price">Rs 33000/Year</div>
                            </li>
                        </ul>
                     </div>
                 </div>
                 <div class="campus">
                    <div><h4>OUR CAMPUS</h4><hr></div>
                    <div class="campus-item">
                        <ul>
                            <li><img src="img/campus1.jpg"/></li>
                            <li><img src="img/campus2.jpg"/></li>
                            <li><img src="img/campus3.jpg"/></li>
                            <li><img src="img/campus4.jpg"/></li>
                            <li><img src="img/campus5.jpg"/></li>
                            <li><img src="img/campus6.jpg"/></li>
                        </ul>
                    </div>
                </div>
             </div>
               
<!----------------------- Event -------------------------------->
                <div class="professors col-3">
                    <div class="prof-title">
                        <h3>Our Professors</h3><hr>
                    </div>
                    <div class="prof-list">
                        <div class="prof-list-item clearfix">
                           <div class="prof-thumb">
                               <img src="img/t1.jpg"/>
                           </div>
                           <div class="prof-details">
                               <h5 class="prof-name">Dr. Subhash Chandra Yadav</h5>
                               <p>Dr Subhash Yadav have 16 years work experience mainly in universities like MGKVP, BHU, CCSU & west minster (U.K.)</p>
                           </div>
                        </div>
                        <div class="prof-list-item clearfix">
                           <div class="prof-thumb">
                               <img src="img/t2.jpg"/>
                           </div>
                           <div class="prof-details">
                               <h5 class="prof-name">Mr. Sanjay Kumar Singh </h5>
                               <p>Mr. Sanjay Singh holds M.Tech (CSE), B.E. (CSE), PGDM (MKTG. & I.T.) and Polytechnic to his credit.</p>
                           </div>
                        </div>
                        <div class="prof-list-item clearfix">
                           <div class="prof-thumb">
                               <img src="img/t3.jpg"/>
                           </div>
                           <div class="prof-details">
                               <h5 class="prof-name">Mr. Anand Mohan Pandey</h5>
                               <p>Mr. Anand Mohan Pandey, M.tech and M.C.A. has more than 10 year's experience in industry and academics.</p>
                           </div>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                <div class="event">
                    <div class="event-heading">
                        <h4>Events</h4><hr>
                    </div>    
                    <div class="event-inner">
                        <div class="event-list">
                            <div class="calender clearfix">
                                <span class="month">March</span>
                                <span class="date">03</span>
                            </div>
                            <div class="event-details">
                                <h5>Workshop 'IT –Industry and Academics Interface'</h5>
                                <p>Seminar Hall 4:30 PM to 6:00 PM</p>
                            </div>
                        </div>
                        <div class="event-list">
                            <div class="calender clearfix">
                                <span class="month">March</span>
                                <span class="date">25</span>
                            </div>
                            <div class="event-details">
                                <h5>Workshop 'Skill Devlopment,PHP and Database'</h5>
                                <p>Seminar Hall 11:30 AM to 4:00 PM</p>
                            </div>
                        </div>
                        <div class="event-list">
                            <div class="calender clearfix">
                                <span class="month">April</span>
                                <span class="date">13</span>
                            </div>
                            <div class="event-details">
                                <h5>Workshop 'Android and Academics Interface'</h5>
                                <p>Seminar Hall 10:30 AM to 3:00 PM</p>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </section>
<!--Footter Start Here-->

<?php include("footer.php"); ?>

<!--/Close Footer-->
</body>
<script>
    var myIndex = 0;
    image_slide();
    
    function image_slide() {
        var i;
        var x = document.getElementsByClassName("gal-img");
        
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        
        myIndex++;
        
        if (myIndex > x.length) {
            myIndex = 1;
        }
        x[myIndex-1].style.display = "block";
        setTimeout (image_slide, 3000);
    }
    
//    myalert("Page Loaded","success");
//    myconfirm();
</script>

</html>